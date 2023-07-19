<?php
    // Sustav za upravljanje knjižnicom

    // 1. Implementirajte klasu Knjiga s atributima (naslov, autor, god.izdanja...).
    //    Dodajte metode za postavljenje i dohvaćanje vrijednosti atributa.
    //    Stvorite objekt klase Knjiga i ispišite informacije o toj knjizi.

    class Knjiga {
        private $naslov;
        private $autor;
        private $godinaIzdanja;

        public function setNaslov($naslov)
        {
            $this->naslov=$naslov;
        }

        public function getNaslov()
        {
            return $this->naslov;
        }

        public function setAutor($autor)
        {
            $this->autor=$autor;
        }

        public function getAutor()
        {
            return $this->autor;
        }

        public function setGodinaIzdanja($godinaIzdanja)
        {
            $this->godinaIzdanja=$godinaIzdanja;
        }

        public function getGodinaIzdanja()
        {
            return $this->godinaIzdanja;
        }

    }

    $knjiga=new Knjiga();
    $knjiga->setNaslov("Vlak u snijegu");
    $knjiga->setAutor("Mato Lovrak");
    $knjiga->setGodinaIzdanja(1920);

    echo "Knjiga: ".$knjiga->getNaslov()."\nAutor: ".$knjiga->getAutor()."\nGodina izdanja: ".$knjiga->getGodinaIzdanja()."\n";



    // 2. Implementirajte apstraktnu klasu Medij s atributom naslov (protected) i apstraktnom metodom prikaziDetalje().
    //    Izvedite klasu Knjiga koja nasljeđuje klasu Medij.
    //    Implementirajte metodu prikaziDetalje() koja će ispisati detalje o knjizi.
    //    Koristite konstruktor i destruktor za inicijalizaciju i oslobađanje resursa.

    // 3. Implementirajte imenski prostor Knjiznica koji sadrzi klasu knjiga.
    //    Stvorite objekt klase Knjiga unutar imenskog prostora Knjiznica i ispišite informacije o toj knjizi.

//    namespace Knjiznica;

    abstract class Medij
    {
        protected $naslov;

        abstract public function prikaziDetalje();

        public function __construct($naslov)
        {
            $this->naslov=$naslov;
        }

        public function __destruct()
        {
            echo "Objekt je uništen\n";
        }
    }

    class Knjiga1 extends Medij
    {
        public function prikaziDetalje()
        {
            echo "\nKnjiga: ".$this->naslov."\n";
        }
    }

    //namespace verzija $knjiga=new \Knjiznica\Knjiga1("Regoč");
    $knjiga1=new Knjiga1("Regoč");
    $knjiga1->prikaziDetalje();

    unset($knjiga1);



    // 4. Implementirajte try-catch blok prilikom pokušaja iznajmljivanja knjige.
    //    Ako korisnik pokuša iznajmiti nedostupnu knjigu treba se generirati iznimka NedostupnaKnjigaException
    //    koju ćete uhvatiti i ispisati odgovarajuću poruku.

    class NedostupnaKnjigaException extends Exception
    {

    }

    class Knjiga3
    {
        public $dostupna;

        public function iznajmi()
        {
            if (!$this->dostupna)
            {
                throw new NedostupnaKnjigaException("\nKnjiga trenutno nije dostupna za posudbu\n");
            }
            else
            {
                echo "\nKnjiga je uspješno posuđena\n";
            }
        }
    }

    $knjiga3=new Knjiga3();

    //$knjiga3->dostupna=true;
    $knjiga3->dostupna=false;


    try
    {
        $knjiga3->iznajmi();
    }
    catch(NedostupnaKnjigaException $e)
    {
        echo $e->getMessage();
    }


?>