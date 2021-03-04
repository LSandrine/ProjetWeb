INSERT INTO `role` (`nomRole`) VALUES ()'eleve'), ('delegue');
INSERT INTO `classe` (`promotion`, `groupe`, `anneeDiplome`) VALUES
('I2', 'G2', '2022'),
('I2', 'G3', '2022'),
('I2', 'G4', '2022'),
('I2', 'G5', '2022'),
('I2', 'G6', '2022'),
('I1', 'G1', '2023'),
('I1', 'G2', '2023'),
('I1', 'G3', '2023'),
('I1', 'G4', '2023'),
('I1', 'G5', '2023'),
('I1', 'G6', '2023'),
('I1', 'G7', '2023'),
('I1', 'G8', '2023'),
('I3', 'G6', '2021'),
('I3', 'G1', '2021'),
('I3', 'G2', '2021'),
('I3', 'G3', '2021'),
('I3', 'G4', '2021'),
('I3', 'G5', '2021')
;
INSERT INTO `utilisateur` (`mail`, `mdp`, `idClasse`) VALUES
('fdupon@3il.fr', '1234', '1'),
('fkarli@3il.fr', '1234', '2'),
('abichon@3il.fr', '1234', '6'),
('plicant@3il.fr', '1234', '19'),
('dtarine@3il.fr', '1234', '15'),
('bminner@3il.fr', '1234', '19'),
('kpublie@3il.fr', '1234', '3'),
('slature@3il.fr', '1234', '5'),
('itilidi@3il.fr', '1234', '1')
;
INSERT INTO `typeevenement` (`nom`) VALUES
('EI'),
('TOEIC'),
('FORUM'),
('SOUTENANCE'),
('DSM')
;
INSERT INTO `evenement` (`nom`, `date`, `description`, `matiere`, `typeRendu`, `idClasse`, `idType`) VALUES
('DS Electronique', '2021-06-18', 'Loi d\'ohm, loi des noeuds, etc. à apprendre par cœur !', 'Electronique', '', '19', '1'),
('EI AnaNum', '2021-04-15', 'Euler Taylor2 RungeKutta', 'Analyse numérique', '', '1', '2'),
('DS Sécurité', '2021-01-12', '', 'Sécurité', '', '2', '1')
;
INSERT INTO `lienutilisateurrole` (`idRole`, `idUtilisateur`, `valide`) VALUES
('1', '2', ''),
('2', '1', ''),
('3', '1', ''),
('4', '1', ''),
('5', '1', ''),
('6', '1', ''),
('7', '1', ''),
('8', '1', ''),
('9', '1', ''),
('10', '1', ''),
('5', '2', ''),
('8', '2', ''),
('10', '2', '')
;
