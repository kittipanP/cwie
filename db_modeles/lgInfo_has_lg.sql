

CREATE TABLE `language` (
  `lg_id` int(11) NOT NULL,
  `lg_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `language`
  ADD PRIMARY KEY (`lg_id`);

ALTER TABLE `language`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT;






ALTER TABLE `bank_acc_info` (
  `bnk_has_id` int(11) NOT NULL
);

ALTER TABLE `bank_acc_info`
  ADD KEY `fk_bnk_has_id` (`bnk_has_id`);


ALTER TABLE `bank_acc_info`
  ADD CONSTRAINT `fkbac_bnk_has_id` FOREIGN KEY (`bnk_has_id`) REFERENCES `bank_has_banch` (`bnk_has_bch_id`) ON DELETE CASCADE ON UPDATE CASCADE;







CREATE TABLE `language_lv` (
  `lv_id` int(11) NOT NULL,
  `lv_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `language_lv`
  ADD PRIMARY KEY (`lv_id`);

ALTER TABLE `language_lv`
  MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT;






CREATE TABLE `lgInfo_has_lv` (
  `lgINfo_has_lv_id` int(11) NOT NULL,
  `lgInfo_id` int(11) NOT NULL,
  `lv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



ALTER TABLE `lgInfo_has_lv`
  ADD PRIMARY KEY (`lgINfo_has_lv_id`),
  ADD KEY `fk_lgInfo_id` (`lgInfo_id`),
  ADD KEY `fk_lv_id` (`lv_id`);

ALTER TABLE `lgInfo_has_lv`
  MODIFY `lgINfo_has_lv_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `lgInfo_has_lv`
  ADD CONSTRAINT `fklglv_lv_id` FOREIGN KEY (`lv_id`) REFERENCES `language_lv` (`lv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fklglv_lgInfo_id` FOREIGN KEY (`lgInfo_id`) REFERENCES `language_info` (`lg_info_id`) ON DELETE CASCADE ON UPDATE CASCADE;