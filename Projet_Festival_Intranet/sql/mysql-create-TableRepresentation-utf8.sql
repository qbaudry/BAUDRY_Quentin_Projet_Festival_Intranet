CREATE TABLE `Representation` (
  `id` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `idGroupe` char(4) COLLATE utf8_bin NOT NULL,
  `dateRep` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `Representation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLieu` (`idLieu`),
  ADD KEY `idGroupe` (`idGroupe`);

ALTER TABLE `Representation`
  ADD CONSTRAINT `fk_presentation_groupe` FOREIGN KEY (`idGroupe`) REFERENCES `Groupe` (`id`),
  ADD CONSTRAINT `fk_presentation_lieu` FOREIGN KEY (`idLieu`) REFERENCES `Lieu` (`id`);