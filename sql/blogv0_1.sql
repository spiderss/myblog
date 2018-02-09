CREATE TABLE `yl_admin` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(20) NOT NULL,
`password` varchar(32) NOT NULL DEFAULT '' COMMENT '//密码',
PRIMARY KEY (`id`) 
);

CREATE TABLE `yl_art_cate` (
`id` int NOT NULL AUTO_INCREMENT,
`cate_name` varchar(80) NOT NULL DEFAULT '' COMMENT '//分类名称',
`cate_image` varchar(100) NOT NULL DEFAULT '' COMMENT '//分类图片',
`cate_keywords` varchar(80) NOT NULL DEFAULT '' COMMENT '//分类关键词',
`cate_description` text NULL COMMENT '//描述信息',
`pid` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `yl_article` (
`id` int NOT NULL AUTO_INCREMENT,
`cateid` int NOT NULL COMMENT '//分类id',
`title` varchar(150) NOT NULL DEFAULT '' COMMENT '//标题',
`author` varchar(50) NOT NULL DEFAULT '' COMMENT '//作者',
`sub_title` varchar(150) NOT NULL DEFAULT '' COMMENT '//子标题',
`keyowrds` varchar(80) NOT NULL,
`description` text NULL,
`thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '//缩略图',
`addtime` int(10) NOT NULL DEFAULT 0 COMMENT '//添加时间',
`updatetime` int(10) NOT NULL DEFAULT 0 COMMENT '//更新时间',
`status` int(1) NOT NULL DEFAULT 99 COMMENT '0,审核，99发布',
PRIMARY KEY (`id`) 
);


ALTER TABLE `yl_article` ADD CONSTRAINT `fk_yl_article_yl_article_1` FOREIGN KEY (`cateid`) REFERENCES `yl_art_cate` (`id`);

