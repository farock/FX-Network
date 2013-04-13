import java.io.File;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.URL;
import java.net.UnknownHostException;
import java.util.Date;

// Programme SONDE installer sur chaque equipement du reseau
// Cree par : PAYET Fabien et PIERRE Xavier
// Anne : 2013
// Mise a jour : Version 1.0

// Informations envoyes au serveur :
//----------------------------------
// Nom du pc : "nom_pc"
// Adresse IP : "ip_add"
// Adresse MAC : "add_mac"
// Temps depuis lancement prog : "tps"
// Date du dernier msg envoye : "date_current"
// Date du dernier msg envoye (en seconde) : "temps_current"
// L'os : "os"

public class Sonde 
{

	public static void main(String[] args) throws UnknownHostException
	{
		try
		{
			 boolean finished = false;
			 int nmb = 1;
			 Date date_debut = new Date();
			 int heures = date_debut.getHours();
			 int minutes = date_debut.getMinutes();
			 int secondes = date_debut.getSeconds();
			 int temps_debut = (heures*3600)+(minutes*60)+(secondes);
			 
			 while (!finished) // Timer 
			 {
				 
				System.out.println("-----------------------------------");
	
				// Pour recuperer l'adresse du serveur entre en ligne de commande :
				String add_serveur = args[0]; 
				
				// Pour l'OS du Post :
				String os = (String) System.getProperties().get("os.name");				
				
				// Pour recuperer son adresse IP :
				InetAddress ip_add_inet = null;
				String ip_add = null;
				String ip_interface = null;
				
				Enumeration<NetworkInterface> interfaces = NetworkInterface.getNetworkInterfaces();
				
				while (interfaces.hasMoreElements()) 
				{
					NetworkInterface ni = (NetworkInterface) interfaces.nextElement();
		 
					if (ni.isUp() && !ni.isLoopback())
					{
		 
					Enumeration<InetAddress> addresses = ni.getInetAddresses();
					
					while (addresses.hasMoreElements()) 
						{
							ip_add_inet = (InetAddress) addresses.nextElement();
							ip_interface = ni.getName();
							if(!(ip_add_inet.getHostAddress()).contains(":"))
							{
								ip_add = ip_add_inet.getHostAddress()+" ("+ip_interface+") "; // met @IP au format String
							}
						}
					}
				}
				
				System.out.println("Mon @IP est :"+ip_add);
			

				// Pour le nom du PC :
				InetAddress ip_add_inet2 = InetAddress.getLocalHost();
				String nom_pc = ip_add_inet2.getHostName(); 
				System.out.println("Mon PC est : "+nom_pc);
				

				
				// Pour l'adresse MAC :
				 StringBuilder add_mac = new StringBuilder();
				 NetworkInterface networkInterface = NetworkInterface.getByInetAddress(ip_add_inet);
				 byte[] mac = networkInterface.getHardwareAddress();
				 for (int i = 0; i < mac.length; i++)
				 {
						add_mac.append(String.format("%02X%s",
								mac[i],
								(i < mac.length - 1) ? "-" : ""));
				 }

	
				
				 System.out.println("Mon @Mac est: "+add_mac);
				 
	
				 // On cree l'URL :
				 URL monUrl = new URL("http://"+add_serveur+"/Supervision/web/hello.php");
				 // On etablis la connection au serveur en POST :
				 HttpURLConnection connexion = (HttpURLConnection) monUrl.openConnection();
				 connexion.setDoOutput(true); 
				 connexion.setRequestMethod("POST");
	
				 // Pour le temps :
				 int temps = 5000;
				 Date date_current = new Date();
				 heures = date_current.getHours();
				 minutes = date_current.getMinutes();
				 secondes = date_current.getSeconds();
				 int temps_current = (heures*3600)+(minutes*60)+(secondes);
				 int temps_enligne = temps_current - temps_debut;

				 
				 // On echange les donnee avec le serveur :
				 OutputStreamWriter writer = new OutputStreamWriter(connexion.getOutputStream());
				 writer.write("nom="+nom_pc+"&addip="+ip_add+"&addmac="+add_mac+"&tps="+temps_enligne+"&date="+date_current+"&tps_current="+temps_current);
				 writer.flush();
					 
				 // On affiche le resultat:
				 Thread.sleep (temps); // En pause pour cinq secondes
				 
				 System.out.println("Code Retour "+nmb+" : "+connexion.getResponseCode());
				 System.out.println("Message "+nmb+" : "+connexion.getResponseMessage());
				 nmb++; 

			  }
			 
 

		}catch(IOException e)
		{
			e.printStackTrace();
		}
		catch(InterruptedException i)
		{
			i.printStackTrace();
		}
		
		

	}
}