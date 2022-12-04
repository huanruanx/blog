# Light Year Admin Using v4 光年后台模板基于Bootstrap 4.4.1的版本。

#### 演示网址
[http://lyear.itshubao.com/v4](http://lyear.itshubao.com/v4)

[猛戳这里去Light Year Admin项目](https://gitee.com/yinqi/Light-Year-Admin-Template)

[猛戳这里去Light Year Admin Using Iframe项目](https://gitee.com/yinqi/Light-Year-Admin-Using-Iframe)

[猛戳这里去Light Year Admin Using Iframe v4项目](https://gitee.com/yinqi/Light-Year-Admin-Using-Iframe-v4)

[猛戳这里去插件整合项目（含v3和v4两个版本示例）](https://gitee.com/yinqi/Light-Year-Example)

#### 模板说明文档
[http://www.bixiaguangnian.com/manual/lyearadmin.html](http://www.bixiaguangnian.com/manual/lyearadmin.html)

#### 介绍
该项目是光年后台管理模板(Light Year Admin)基于bootstrap 4.4.1版本。

因不少朋友需要用到非iframe的项目，这里特意对v4的iframe项目作出调整，整理出来的非iframe版本，相对于v4的iframe项目：

- 也是将暗黑和半透明的两个主题重新拿回来了
- 因为主题方面在页面切换的时候会有颜色闪烁的情况，这里在页面中加上页面loading，避免这个情况的影响
- 去掉了文件夹monent.js中的点，避免出现路径问题
- 将bootsttrap-table版本升级为1.17.1

因群里有小伙伴提到有和网友对于光年模板版权上的一些争执，我特意申请了软件著作权，在这里也再提一下，光年模板是完全开源免费的，大家可以放心在学习和商业中使用，无需找我授权。

版权号：2022SR0104200

#### 3.*和4.*的一些区别
- 3中的pull-left和pull-right已改成float-left和float-right，hidden改为d-none
- 删除了原有的label类，统一成badge
- 原有的nav下面的li和a标签，新增了class，li上的nav-item，a上的nav-link
- 下拉选项中需要dropdown-item，分割线类名改为dropdown-divider，并且向下的那个图标不需要在新增span元素了
- 输入框组中的input-group-addon已改为input-group-prepend和input-group-append以及input-group-text搭配
- card在3中是没有的，4因为有了默认的一些样式，这里在4的上面做了些调整，并处理成之前差不多的样子
- 栅格布局由原来的float:left改成了flex布局的方式
- carousel幻灯片，原有的item改为carousel-item，left carousel-control和right carousel-control改成carousel-control-prev和carousel-control-next
- 分页中新增了page-item和page-link
- 4中原有响应式样式table-responsive不显示边框，这里调整为跟3版本一样的效果
- 4中新增了不少内容，像复选框、单选框和滑块都有自定义的样式，另外还有新增spinners和toasts等

#### Class搜索小工具
[此网址可以方便找到v3和v4中自己想要的class](http://libs.itshubao.com/lyear-search-class/)

#### 交流群
![输入图片说明](https://images.gitee.com/uploads/images/2021/0419/100848_c8cf9210_82992.png "光年后台模板交流群群聊二维码.png")

#### 特别感谢
- Bootstrap v4.4.1
- JQuery
- Chart.js
- perfect-scrollbar
- Bootstrap-Multitabs
- bootstrap-clockpicker
- bootstrap-colorpicker
- bootstrap-datepicker
- bootstrap-datetimepicker
- bootstrap-table
- jquery-confirm
- jquery-tagsinput
- jquery-treegrid
- moment.js
- bootstrap-notify
- chosen.jquery
- jquery.cookie
- lyear-loading
- perfect-scrollbar
- popper
- bootstrap.wizard
- fullcalendar
- bootstrap-maxlength
- bootstrap-select
- ...

#### 更新记录


#### 截图
![登录页面一](https://images.gitee.com/uploads/images/2020/0519/221358_55b9d666_82992.png "首页 - 光年(Light Year Admin V4)后台管理系统模板8.png")

![登录页面2](https://images.gitee.com/uploads/images/2020/0519/221535_3f2cd076_82992.png "登录页面 - 光年(Light Year Admin V4)后台管理系统模板7.png")

![首页](https://images.gitee.com/uploads/images/2020/0923/152922_ff633267_82992.png "光年后台管理模板-首页-1.png")

![首页-暗黑](https://images.gitee.com/uploads/images/2020/0923/152955_67da13cd_82992.png "光年后台管理模板-首页-暗黑.png")

![首页-半透明](https://images.gitee.com/uploads/images/2020/0923/153011_ffa2dcf0_82992.jpeg "光年后台管理模板-首页-半透明.jpg")

![表格数据页](https://images.gitee.com/uploads/images/2020/0923/153025_896c485d_82992.png "光年后台管理模板-数据页.png")

