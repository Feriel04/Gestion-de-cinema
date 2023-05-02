import java.net.*;
import java.io.*;
import java.util.*;

public class clienttcp{




	public static void main(String[] args)throws IOException{
	
	Socket s=new Socket("localhost",44557);

	
	
	Scanner sc=new Scanner(System.in);
	
		
	InputStreamReader in=new InputStreamReader(s.getInputStream());
	
	BufferedReader bf=new BufferedReader(in);
	
	 PrintWriter pr=new PrintWriter(s.getOutputStream());
	
	String id_ticket;
	System.out.println("Rentrez votre code barre SVP !");
	System.out.print("Code barre:");
	id_ticket=sc.next();
	System.out.print("Code barre:"+id_ticket);
	System.out.println();
	


        
        pr.print(id_ticket);
	pr.flush();

	/*if((password.startsWith("drop")) | (password.startsWith("alter")) | (password.startsWith("insert")) | (password.startsWith("select"))){
	do{
	
	System.out.print("ENTREZ UN MOT DE PASSE VALIDE  !:");
	password=sc.next();
	
	}while((password.startsWith("drop")) | (password.startsWith("alter")) | (password.startsWith("insert")) | (password.startsWith("select")));

	}*/
	
	
	
	//ecrire des donnes et les envoyer au serveur 
	
	
	
	String str=bf.readLine();
	System.out.println("valeur recu in client "+str);
	

	
	// recuperation des donnees envoyer par le serveur et les afficher 

	/*if(str.equals("inscrit")){

	System.out.print("Nom                           : ");
	nom=sc.next();
	pr.print(nom);
	pr.flush();

	System.out.println();
	System.out.print("Prenom                        : ");
	prenom=sc.next();
	pr.print(prenom);
	pr.flush();

	System.out.println();
	System.out.print("Adresse postale               : ");
	prenom=sc.next();
	pr.print(prenom);
	pr.flush();

	System.out.println();
	System.out.print("Numero de telephone           : ");
	prenom=sc.next();
        pr.print(prenom);
	pr.flush();
	System.out.println();
	System.out.print("Age                           : ");
	prenom=sc.next();
	pr.print(prenom);
	pr.flush();
	System.out.println();
	System.out.print("Adresse mail                  : ");
	prenom=sc.next();
        pr.print(prenom);
	pr.flush();
	System.out.println();
	System.out.print("password                      : ");
	prenom=sc.next();
	pr.print(prenom);
	pr.flush();


	}else{
	
	
	System.out.println("Vous etes bien identifier 🎢️");
       System.out.println("CHOISISSEZ UNE OFFRE🎢️");
       str=bf.readLine();
	System.out.println(str);

	
       }*/
}
}
