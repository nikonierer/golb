#
# Table structure for table 'pages'
#
CREATE TABLE pages (
    tx_golb_subpages int(11) DEFAULT '0' NOT NULL,
    tx_golb_view_count int(11) DEFAULT '0' NOT NULL,
    tx_golb_related varchar(255) DEFAULT NULL,
    tx_golb_content_elements int(11) DEFAULT '0' NOT NULL,
    tx_golb_author_image int(11) unsigned DEFAULT '0',
    tx_golb_publish_date int(11) DEFAULT '0' NOT NULL,
    tx_golb_tags int(11) DEFAULT '0' NOT NULL,
    tx_golb_archived tinyint(4) DEFAULT '0' NOT NULL
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
    tx_golb_exclude varchar(40) DEFAULT '' NOT NULL,
    tx_golb_archived tinyint(4) DEFAULT '0' NOT NULL,
    tx_golb_allow_demand_overwrite tinyint(4) DEFAULT '1' NOT NULL
);

#
# Table structure for table 'tx_golb_domain_model_tag'
#
CREATE TABLE tx_golb_domain_model_tag (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    t3ver_oid int(11) DEFAULT '0' NOT NULL,
    t3ver_id int(11) DEFAULT '0' NOT NULL,
    t3ver_wsid int(11) DEFAULT '0' NOT NULL,
    t3ver_label varchar(30) DEFAULT '' NOT NULL,
    t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
    t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
    t3ver_count int(11) DEFAULT '0' NOT NULL,
    t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
    t3ver_move_id int(11) DEFAULT '0' NOT NULL,
    t3_origuid int(11) DEFAULT '0' NOT NULL,
    editlock tinyint(4) DEFAULT '0' NOT NULL,
    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumtext,
    l10n_source int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    starttime int(11) DEFAULT '0' NOT NULL,
    endtime int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    fe_group varchar(100) DEFAULT '0' NOT NULL,

    title varchar(255) DEFAULT '' NOT NULL,
    slug varchar(255) DEFAULT '' NOT NULL,
    pages int(11) DEFAULT '0' NOT NULL,
    description mediumtext,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY sys_language_uid_l10n_parent (sys_language_uid,l10n_parent)
);

#
# Table structure for table 'tx_golb_page_tag_mm'
#
CREATE TABLE tx_golb_page_tag_mm (
    uid_local int(11) DEFAULT '0' NOT NULL,
    uid_foreign int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    sorting_foreign int(11) DEFAULT '0' NOT NULL,
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_golb_page_related_page_mm'
#
CREATE TABLE tx_golb_page_related_page_mm (
    uid_local int(11) DEFAULT '0' NOT NULL,
    uid_foreign int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    sorting_foreign int(11) DEFAULT '0' NOT NULL,
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);