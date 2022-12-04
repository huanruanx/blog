/*
 * @Author       : Lucifer
 * @Date         : 2022-11-25 10:37:08
 * @LastEditTime : 2022-11-25 10:51:24
 * @FilePath     : \blog\public\static\public\js\main.js
 */
setInterval(
    function () {
        var data = new Date();
        var year = data.getFullYear();
        var mon  = data.getMonth() + 1;
        var day = data.getDay();
        var h = data.getHours();
        var m = data.getMinutes();
        var s = data.getSeconds();
        var d = document.getElementById('time');
        d.innerHTML = '当前时间：'+year+'年'+mon+'月'+day+'日'+h+'时'+m+'分'+s+'秒';
    }
);