# Uprawnienia dla `Doorman`@`%`

GRANT USAGE ON *.* TO `Doorman`@`%` IDENTIFIED BY PASSWORD '*7624D314C5B3AE1D6F266E059E65AF1658BEBCDC';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`seanse` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`users` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`bilety` TO `Doorman`@`%`;


# Uprawnienia dla `FilmViewer`@`%`

GRANT USAGE ON *.* TO `FilmViewer`@`%`;

GRANT SELECT ON `kinotemp`.`bilety` TO `FilmViewer`@`%`;

GRANT SELECT, SHOW VIEW ON `kino`.`seanse` TO `FilmViewer`@`%`;

GRANT SELECT ON `kinotemp`.`filmy` TO `FilmViewer`@`%`;

# Uprawnienia dla `UserAdmin`@`%`

GRANT USAGE ON *.* TO `UserAdmin`@`%` IDENTIFIED BY PASSWORD '*131293A4F93294908DFFFBA266260BF9D4213106';

GRANT ALL PRIVILEGES ON `kinotemp`.* TO `UserAdmin`@`%` WITH GRANT OPTION;

GRANT SELECT (EMAIL), INSERT (EMAIL), DELETE, CREATE, DROP, ALTER, SHOW VIEW ON `kinotemp`.`users` TO `UserAdmin`@`%`;