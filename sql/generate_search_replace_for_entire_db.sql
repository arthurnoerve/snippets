SELECT
	CONCAT('UPDATE `', table_name, '` SET `', column_name, '` = REPLACE(`',column_name,"`, '<GAMMELT>', '<NYTT>' );")
FROM
	`information_schema`.`columns`
WHERE
	`table_schema` = '<DATABASE>' AND table_name LIKE '<PREFIX>_%';