
-paste the folder exam on htdocs folder.

-dbname: urlshorter_exam

-table name: short_urls

-run command to create table: CREATE TABLE `short_urls` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `long_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `short_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `hits` int(11) NOT NULL,
 `created` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-set value of the ff: $dbHost,
                    $dbUsername,
                    $dbPassword
                    (depending on database user credentials)
                    at config.php found on config folder.

-change the value of $domain found in index.php depending of what port you are using.

-To run => input localhost:/exam/ or localhost:8080/exam/ on the browser.
