/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/

INSERT INTO User (id, name, firstname, email, roles, password, pseudo)
VALUES      (1, 'Antoniak', 'Loïc', 'loic.antoniak@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$Ak9ghnkuhZ7Nrdk93qMsHA$1C1rU/fsPROcnWOkXN2nHQhGlg1ZPBBQUae03SgsArs', 'anto0037'),
            (2, 'Barocco', 'Maxime', 'maxime.barocco@etudiant.univ-reims.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$Nn3JA97CRG0NcMmhTq2kOQ$geW91+9z8N9sABZVuaN0O31QbVESC+BQj5XfH/AkouU', 'baro0021'),
            (3, 'Martinsky', 'Michaël', 'michael.martinsky1@etudiant.univ-reims.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$4f/L1KAXrYJKXv59AgYlTQ$R7pNAKUPXM/CssD2dqbGDdTHcTV8kHJgOMU06xYgQb0', 'mart0261'),
            (4, 'Delmotte', 'Fabien', 'fabien.delmotte@etudiant.univ-reims.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$/KisE/LVd57qc0Wtkm6Cwg$mbvnn23st1wvt0ljJpFdIELVVdOfWC/2gLjJLzZmkcE', 'delm0011'),
            (5, 'Hautois', 'Loïc', 'loic.hautois@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$rxk+VT3x6G23N2JzO98mXA$IGB91/uqaQVjgyxm/wvkjTLQkC7737XjCrPLLNC2mA8', 'haut0011'),
            (6, 'Vincent', 'Jan Michaël', 'jan-michael.vincent@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$M3I23kuHGTjuFNamK6jhtw$bEjc5NvsbDFsmLMHZ6XUFVso1hlPhokjyOdIuETMCr0', 'vinc0043'),
            (7, 'Huynh', 'Jean-Christophe', 'jean-christophe.huyn@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$umNJnU2BiTDMwD2sUh5Lng$kOwG68PK2BQ9HarwjxS+pgk/LxccjDawdJTrMqE5FoQ', 'huyn0011'),
            (8, 'De Babo', 'Christophe', 'christophe.de-babo@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$+x98se5tIBabWh4yPwKmFA$ccrnzOWodnb3HMwoPqZ36/AdDyU6PjtDA1aQMHLmkhQ', 'de-b0020'),
            (9, 'Fay', 'Nicolas', 'nicolas.fay@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$/e/TJNPiw31lO5FssdBZVA$j4Rxsr9+EX9XcdgaJ5Z+Im1OqFrPaoWrLitqY9l5NqU', 'fay0016'),
            (10, 'Chauwin', 'Geoffrey', 'geoffrey.chauwin@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$aUUCPZb4Z3R0UnB2kGvPig$gl21mcLTcikfh8rx0yg4HQ1XL2WB1Bn7b1LWBzEm//4', 'chau0072'),
            (11, 'Peckre', 'Gérard', 'gerard.peckre@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$qHjLxiOQkN3e7uViXoKvcA$Po1LTuk3ygfLYiTxIxYwgq27SAYwBKX8C8d9XNdNxlw', 'peck0001'),
            (12, 'Zakari', 'Alla Eddine', 'allaeddine.zakari@etudiant.univ-reims.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$wkbwUE2wk23A3SfRQKtIiQ$HYfxjsb+lyY5X6exhpltPcrq66rEkmfpKrjBzd7lNmo', 'zaka0002');
