# Uprawnienia dla `Doorman`@`%`

GRANT USAGE ON *.* TO `Doorman`@`%` IDENTIFIED BY PASSWORD '*7624D314C5B3AE1D6F266E059E65AF1658BEBCDC';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kinotemp`.`users` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kinotemp`.`seanse` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`seanse` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kinotemp`.`bilety` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`bilety` TO `Doorman`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `kino`.`users` TO `Doorman`@`%`;


# Uprawnienia dla `FilmViewer`@`%`

GRANT USAGE ON *.* TO `FilmViewer`@`%`;

GRANT SELECT ON `kinotemp`.`bilety` TO `FilmViewer`@`%`;

GRANT SELECT ON `kino`.`bilety` TO `FilmViewer`@`%`;

GRANT SELECT, SHOW VIEW ON `kino`.`seanse` TO `FilmViewer`@`%`;

GRANT SELECT ON `kino`.`filmy` TO `FilmViewer`@`%`;

GRANT SELECT, SHOW VIEW ON `kino`.`sale` TO `FilmViewer`@`%`;

GRANT SELECT, SHOW VIEW ON `kinotemp`.`seanse` TO `FilmViewer`@`%`;


# Uprawnienia dla `UserAdmin`@`%`

GRANT USAGE ON *.* TO `UserAdmin`@`%` IDENTIFIED BY PASSWORD '*131293A4F93294908DFFFBA266260BF9D4213106';

GRANT ALL PRIVILEGES ON `kino`.* TO `UserAdmin`@`%` WITH GRANT OPTION;

GRANT DELETE, CREATE, DROP, ALTER, SHOW VIEW ON `kino`.`users` TO `UserAdmin`@`%`;