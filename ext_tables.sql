#
# Table structure for table 'pages'
#
CREATE TABLE pages (
    tx_golb_subpages int(11) DEFAULT '0' NOT NULL,
    tx_golb_view_count int(11) DEFAULT '0' NOT NULL,
    tx_golb_related varchar(255) DEFAULT NULL,
    tx_golb_content_elements int(11) DEFAULT '0' NOT NULL,
    tx_golb_author_image int(11) unsigned DEFAULT '0'
);

#
# Table structure for table 'sys_category'
#
CREATE TABLE sys_category (
    tx_golb_sub_categories int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    tx_golb_sorting varchar(255) DEFAULT NULL,
    tx_golb_sorting_direction varchar(255) DEFAULT NULL,
    tx_golb_limit int(4) DEFAULT NULL,
    tx_golb_offset int(4) DEFAULT NULL,
    tx_golb_action varchar(40) DEFAULT '' NOT NULL,
    tx_golb_exclude varchar(40) DEFAULT '' NOT NULL
);