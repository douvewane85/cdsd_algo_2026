# Menu
   1-Ajouter un Employe
   2-Affecter un Employe a un Departement
   3-Afficher les  Employe d'un Departement
   4-Afficher Tous les  Employes 
   5-Quitter

# Fonctionnalites   
   a- 1-Ajouter un Employe +/- Affecter 
   b- 3-Afficher les  Employe d'un Departement
  

# Entity
type Departement=Classe
Debut 
  prive code : entier
  prive nom : chaine
  prive employes:TabEmploye
  prive nbreEmploye:entier

  public Departement()
  Debut
     this.nbreEmploye<-0
  Fin
 public Departement(D code : entier,  nom : chaine)
  Debut
     this.code<=code
     this.nom<=nom
     this.nbreEmploye<-0
  Fin

  //Getters et Setters

  //ToChaine
  public fonction toChaine():chaine
  Debut
    retourner "Code ",this.code," Nom :",this.nom
  Fin

public fonction getNbreEmploye():entier
Debut
   retourner this.nbreEmploye
Fin

public fonction addEmploye(D employe:Employe):booleen
Debut
   si(this.nbreEmploye<N) alors
       this.nbreEmploye <- this.nbreEmploye+1
       this.employes[this.nbreEmploye]<--employe
       retourner Vrai
   Fsi
   retourner Faux
Fin

public procedure getEmployes(D/R allEmployes:TabEmploye)
var
 i:entier
Debut
   pour(i<--1;i<=this.nbreEmploye;i<--i+1) faire
     allEmployes[i]<-- this.employes[i]
   Fpour
Fin


FinClasse

type Employe=Classe
Debut 
  prive matricule : chaine
  prive nom : chaine

  prive departement:Departement

  public Employe()
  Debut
  Fin
 public Employe(D matricule : chaine,  nom : chaine)
  Debut
     this.matricule<=matricule
     this.nom<=nom
  Fin

  //Getters et Setters

  //ToChaine
  public fonction toChaine():chaine
  Debut
    retourner "Matricule ",this.matricule," Nom :",this.nom
  Fin
  public fontion getDepartement():Departement
  Debut
    retourner this.departement
  Fin

  public procedure affecterDepartement(D departement:Departement)
  
  Debut
     this.departement<--departement
  Fin

    
FinClasse
const N=100
Type TabEmploye =tableau [1..N]Employe
Type TabDepartement =tableau [1..N]Departement

# Services

type EmployeService=Classe
Debut
    prive employes:TabEmploye
    prive nbreEmploye:entier
    public EmployeService()
    Debut
    Fin

    public fonction getNbreEmploye():entier
    Debut
    retourner this.nbreEmploye
    Fin

public fonction addEmploye(D employe:Employe):booleen
Debut
   si(this.nbreEmploye<N) alors
       this.nbreEmploye <- this.nbreEmploye+1
       this.employes[this.nbreEmploye]<--employe
       retourner Vrai
   Fsi
   retourner Faux
Fin

public procedure getEmployes(D/R allEmployes:TabEmploye)
var
 i:entier
Debut
   pour(i<--1;i<=this.nbreEmploye;i<--i+1) faire
     allEmployes[i]<-- this.employes[i]
   Fpour
Fin

Fin

type DepartementService=Classe
Debut
    prive departements:TabDepartement
    prive nbreDepartement:entier
    public DepartementService()
    Debut
    Fin

    public fonction getNbreDepartement():entier
    Debut
    retourner this.nbreDepartement
    Fin



public procedure getDepartements(D/R allDepartement:TabDepartement)
var
 i:entier
Debut
   pour(i<--1;i<=this.nbreDepartement;i<--i+1) faire
     allDepartement[i]<-- this.departements[i]
   Fpour
Fin

Fin


# Views

type EmployeView=Classe
Debut
 public EmployeView()
 Debut
 Fin

 public fonction saisieEmploye():Employe
 var
   emp:Employe
   matricule,nom:chaine
 Debut
    faire
    Ecrire("Entrer le Matricule")
    lire(matricule)
    tantque(matricule="")

    faire
    Ecrire("Entrer le Nom")
    lire(nom)
    tantque(nom="")
    emp<--new Employe(matricule,nom)
    retourner  emp
 Fin

public procedure afficheEmployes( D employes:TabEmploye,nbreEmploye:entier)
 var 
  i:entier
 Debut
    pour(i<--1;i<=nbreEmploye;i<--i+1) faire
       Ecrire(employes[i].toChaine())
   Fpour
 Fin

 public fonction selectionnerDepartement( D departements:TabDepartement,nbreDepart:entier):Departement
 var 
  i:entier
  indexDepart:entier
 Debut
    pour(i<--1;i<=nbreDepart;i<--i+1) faire
       Ecrire(i,"-",departements[i].getNom())
       faire
         lire(indexDepart)
       tanque(indexDepart<0 || indexDepart>nbreDepart)
    Fpour
    retourner departements[indexDepart];

 Fin


FinClasse

# Principal
type App=Classe
Debut
 public App()
 Debut
 Fin

 public procedure main()
  var 
    choix:entier
    empView:EmployeView
    empServ:EmployeService
    deptServ:DepartementService
    emp:Employe
    result:booleen
    allEmployes:TabEmploye nbreEmp:entier
    rep:Caractere
    allDepartements:TabDepartement,nbreDepart:entier
    dept:Departement
 Debut
     empView<--new EmployeView()
     empServ<--new EmployeService()
      deptServ<--new DepartementService()
   faire
     Ecrire("1-Ajouter un Employe")
     Ecrire("3-Afficher les  Employe d'un Departement")
     Ecrire("5-Quitter")
     lire(choix)

     cas (choix) vaut
        1: 
             emp<--empView.saisieEmploye()
             Ecrire("Voulez vous Affecter un Departement a cette employe(O/N)")
             lire(rep)
             si(rep='O') alors
                   deptServ.getDepartements(allDepartements)
                   nbreDepart<--deptServ.getNbreDepartement()
                   dept<--empView.selectionnerDepartement(allDepartements,nbreDepart)
                   //Relation  ManyToOne (Employe-->Departement)
                        emp.affecterDepartement(dept)
                   //Relation  OneToMany (Departement--->Employe)
                     dept.addEmploye(emp)
             Fsi
               result<-- empServ.addEmploye(emp)
            si(result=Vrai) alors
              Ecrire("Employe ajouter avec success")
            sinon
              Ecrire("Le Tableau est rempli")
            Fsi

        3: 
        empServ.getEmployes(allEmployes)
        nbreEmp<--empServ.getNbreEmploye()
        empView.afficheEmployes(allEmployes,nbreEmp)
     
     FinCas 
   tantque(choix!=5)

 Fin

 
FinClasse