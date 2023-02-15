<?php

class DataAccess{

//1-methode connection
        static function connextion()
        {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $bdd;
            } catch (Exception $e) {
                echo ('Erreur : ' . $e->getMessage());
            }
        }


//2-Methode de mise à jour
        static function miseajour($req)
        {
            try {
                $bdd = self::connextion();
                $maj = $bdd->exec($req);
                return $maj;
            } catch (Exception $e) {
                echo ('Erreur : ' . $e->getMessage());
            }
            $bdd = null;
        }

//3-Methode de selection

        static function selection($req)
        {
            try {
                $bdd = self::connextion();
                $rep = $bdd->query($req);
                return $rep;
            } catch (Exception $e) {
                echo ('Erreur : ' . $e->getMessage());
            }
            $bdd = null;
        }
        }