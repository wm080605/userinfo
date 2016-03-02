<?php
$config['cache_lifetime'] = 60;
$config['caching'] = false;
$config['template_dir'] = APPPATH .'views';
$config['compile_dir'] = APPPATH .'template_c';
$config['cache_dir'] = APPPATH . 'cache';
$config['config_dir'] = APPPATH . 'config';
$config['use_sub_dirs'] = false; //子目录变量(是否在缓存文件夹中生成子目录)
$config['left_delimiter'] = '{%';
$config['right_delimiter'] = '%}';