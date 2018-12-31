import sys
import json
from osgeo import gdal
import os
import numpy as np
import cv2


class GRID:

    # 读图像文件
    def read_img(self, filename):
        dataset = gdal.Open(filename)  # 打开文件

        im_width = dataset.RasterXSize  # 栅格矩阵的列数
        im_height = dataset.RasterYSize  # 栅格矩阵的行数

        im_geotrans = dataset.GetGeoTransform()  # 仿射矩阵
        im_proj = dataset.GetProjection()  # 地图投影信息
        im_data = dataset.ReadAsArray(0, 0, im_width, im_height)  # 将数据写成数组，对应栅格矩阵

        del dataset
        return im_proj, im_geotrans, im_data

    # 写文件，以写成tif为例
    def write_img(self, filename, im_proj, im_geotrans, im_data):
        # gdal数据类型包括
        # gdal.GDT_Byte,
        # gdal .GDT_UInt16, gdal.GDT_Int16, gdal.GDT_UInt32, gdal.GDT_Int32,
        # gdal.GDT_Float32, gdal.GDT_Float64

        # 判断栅格数据的数据类型
        # print(im_data.dtype.name)
        if 'int8' in im_data.dtype.name:
            datatype = gdal.GDT_Byte
        elif 'int16' in im_data.dtype.name:
            datatype = gdal.GDT_UInt16
        else:
            datatype = gdal.GDT_Float32

        # 判读数组维数
        if len(im_data.shape) == 3:
            im_bands, im_height, im_width = im_data.shape
        else:
            im_bands, (im_height, im_width) = 1, im_data.shape

        # 创建文件
        driver = gdal.GetDriverByName("GTiff")  # 数据类型必须有，因为要计算需要多大内存空间
        dataset = driver.Create(filename, im_width, im_height, im_bands, datatype)

        dataset.SetGeoTransform(im_geotrans)  # 写入仿射变换参数
        dataset.SetProjection(im_proj)  # 写入投影

        if im_bands == 1:
            dataset.GetRasterBand(1).WriteArray(im_data)  # 写入数组数据
        else:
            for i in range(im_bands):
                dataset.GetRasterBand(i + 1).WriteArray(im_data[i])

        del dataset


"""
$cmd='python ./calculate.py' . ' ' .
    $greenChanel . ' '  . $nirChanel .  ' ' .  $threshold . ' ' .
    $imgPath . $imgName;
"""

def return_json(msg, status):
    print(json.dumps({'msg':msg, 'status': status}))
    sys.exit()

import traceback
if __name__ == "__main__":
    if len(sys.argv) != 5:
        return_json('Invalid arguments.', '-1')
    greenChanel, nirChanel, threshold, imgFile = sys.argv[1:]
    try:
        greenChanel = int(greenChanel) - 1
        nirChanel = int(nirChanel) - 1
        threshold = float(threshold)
        assert os.path.exists(imgFile)
    except Exception as identifier:
        return_json('Invalid arguments.', '-1')

    # 数据有7个波段，蓝波段序号为2，绿波段序号为3，红波段序号为4，近红外波段序号为5
    # os.chdir(r'C:\Users\NewbeeWen\Desktop\HTML\Final')  # 切换路径到待处理图像所在文件夹
    run = GRID()
    try:
        proj, geotrans, data = run.read_img(imgFile) # 读数据
    except Exception as identifier:
        return_json('Invalid image.', '4')

    data = data.astype(np.float_)
    bands = data.shape[0];
    if not greenChanel in range(bands):
        return_json('GreenChanel out of range.', '1')
    if not int(nirChanel) in range(bands):
        return_json('NirChanel out of range.', '2')

    g, nir = data[greenChanel], data[nirChanel]
    ndwi = (g - nir) / (g + nir)
    run.write_img('./results/ndwi.tif', proj, geotrans, ndwi)

    if ndwi.min() < threshold < ndwi.max():
        ret, thresh = cv2.threshold(ndwi, float(threshold), 1, 0)
        run.write_img('./results/ndwi_binary.tif', proj, geotrans, thresh)
        return_json('succeed', '0')
    else:
        return_json('Threshold out of range.', '3')

    """
    run.write_img('_water.tif', proj, geotrans, data)  # 写数据
    ndvi = (data[4] - data[3]) / (data[4] + data[3])  # 5为近红外波段；4为红波段
    # print(ndvi.dtype)
    # ndvi = ndvi.astype(np.uint8)
    run.write_img('results/water_ndvi.tif', proj, geotrans, ndvi)  # 写为ndvi图像
    """
    """
    B = data[1].astype(np.uint8)
    ret, thresh = cv2.threshold(B, 220, 255, 0)
    cv2.imshow("Blue", thresh)
    print(B)
    run.write_img('./results/cloud.tif', proj, geotrans, B)
    """
    """
    """

    # cv2.waitKey()
    # cv2.destroyAllWindows()
