#!/bin/bash
# @Author: tekintian
# @Date:   2024-11-02 11:37:43
# @Last Modified by:   tekintian
# @Last Modified time: 2024-11-02 16:22:20
# stop php内置服务
# 获取运行中的php内置服务PID
# 使用方法: sh stop.sh
# 指定端口: sh stop.sh -p 8000
#
# 获取用户输入
while getopts ":p:" opt
do
    case $opt in
        p)
          SERVER_PORT=$OPTARG;;
        ?)
        echo "Unknown parameter"
        exit 1;;
    esac
done

# -p 端口 默认 8000
SERVER_PORT=${SERVER_PORT:-"8000"}

# 获取指定端口运行的PHP内置服务PID
PHP_SERVER_PID=$(ps -ef|grep "php"|awk '/:'${SERVER_PORT}'/{print $2}')

# -n 判断当前变量是否不为空, -z 判断当前变量为空 
if [[ -n $PHP_SERVER_PID ]]; then
	kill -9 $PHP_SERVER_PID
	echo "成功停止${SERVER_PORT}端口上的PHP内置服务"
else
	echo "端口 ${SERVER_PORT} 上没有运行PHP内置服务"
fi
