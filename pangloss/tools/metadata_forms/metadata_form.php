<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulaire</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#BFD8F2">


        



<table width="100%" height="100%" align="center">
	<tr>
		<td align="center"><h3>Métadonnées concernant le fichier audio</h3>
		</td>
		<td align="center"><h3>Métadonnées concernant le fichier d'annotations (s'il y en a un)</h3>
		</td>
	</tr>
    
    
	<tr valign="top">
		<td>

 	 	<form id="form_metadata_sound" name="form_metadata_sound" action="xml_metadata.php" method="post">
        <input name="metadata" type="hidden" title="metadata" value="metadata_sound"  />
  <table border="2" width="80%" height="80%" align="center" >
  <tr>
  <td>
            <strong>Nom du fichier audio que décrit ces métadonnées <br/> (pas d'espace ni d'accent) *</strong><br/>
            <span id="sprytextfield1_1">
            <input name="audio_file" type="text" title="audio_file"  />
            <span class="textfieldRequiredMsg">Obligatoire</span></span></td>
  
  </tr>
  			<tr>
            
  				<td>
        			<strong>Titre *</strong><br />
		    <span id="sprytextfield1_2">
					<input name="title" type="text" title="title"  />
 					<span class="textfieldRequiredMsg">Obligatoire</span></span>
                    
   	  <span id="spryradio1_1">
  					<input name="lang_title" type="radio" value="en" id="lg_title_0" title="en" />
 					<label>en</label>
					
					<input type="radio" name="lang_title"  value="fr" title="fr" id="lg_title_1" />
					<label>fr</label>
				
                    <input type="radio" name="lang_title"  value="other" title="other" id="lg_title_2" />
					<label>autre (code langue du titre)</label>
				
                	<input name="lang_title_other" type="text" title="lg_other" size="3" >
<br/>
					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
                    <br/>
                    
                    <strong>Titre alternatif (dans une autre langue)</strong><br />
			    
					<input name="title_alt" type="text" title="title_alt"  />
				<span class="textfieldRequiredMsg">Obligatoire</span></span>
                   
				  <input name="lang_title_alt" type="radio" value="en" id="lg_title_alt_0" title="en" />
 					<label>en</label>
					
				  <input type="radio" name="lang_title_alt"  value="fr" title="fr" id="lg_title_alt_1" />
					<label>fr</label>
				
                  <input type="radio" name="lang_title_alt"  value="other" title="other" id="lg_title_alt_2" />
					<label>autre (code langue du titre alternatif)</label>
                    
                   
                  <input name="lang_alt_other" type="text" title="lg_other" size="3" />
				<br/>
                <br/>
                    
                    <strong>Autre titre alternatif (dans une autre langue)</strong><br />
			    
					<input name="title_alt_autre" type="text" title="title_alt_autre"  />
				<span class="textfieldRequiredMsg">Obligatoire</span></span>
                   
				  <input name="lang_title_alt_autre" type="radio" value="en" id="lg_title_alt_autre_0" title="en" />
 					<label>en</label>
					
				  <input type="radio" name="lang_title_alt_autre"  value="fr" title="fr" id="lg_title_alt_autre_1" />
					<label>fr</label>
				
                  <input type="radio" name="lang_title_alt_autre"  value="other" title="other" id="lg_title_alt_autre_2" />
					<label>autre (code langue du titre alternatif)</label>
                    
                   
                  <input name="lang_alt_autre_other" type="text" title="lg_other" size="3" />
				<br/>
                
				(CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />
                	

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
 
			  </td>
 			</tr>
   			 <tr>
  				<td>
        			<strong>Langue d'étude *</strong><br />
      <span id="sprytextfield1_3">
					<input name="language" type="text" title="language"  />
 					<span class="textfieldRequiredMsg">Obligatoire</span></span>
            		<br/>
            		<strong>Code langue * </strong> <br/>
      <span id="sprytextfield1_4">
					<input name="code_language" type="text" title=		"code_language"  />
 					<span class="textfieldRequiredMsg">Obligatoire</span></span>
            		<br/>            		(CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />
			
      		</td>   	
   		 </tr>
         <tr>
  				<td>
        			<strong>Autres langues éventuellement présentes dans l'enregistrement</strong><br />
					
					<p><strong>Langue 1</strong><br />
        			  
        			  <input name="lg1" type="text" title="lg1"  />
        			  
        			  <br/>
        			  <strong>Code langue</strong> <br/>
        			  
        			  <input name="code_language_1" type="text" title="code_language_1"  />
        			  
        			  <br/>
        			  <br/>
        			  <strong>Langue 2</strong><br />
        			  
        			  <input name="lg2" type="text" title="lg2"  />
        			  
        			  <br/>
        			  <strong>Code langue</strong> <br/>
        			  
        			  <input name="code_language_2" type="text" title="code_language_trad2"  />
        			  <br/>
                    
				(CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br/>
            	
			
      		</td>   	
   		 </tr>
    	 <tr>
	  		<td>

  
        	<strong>Lieu de l'enregistrement *</strong>
            <font color="#FF00FF"> Format : pays, ville,.... </font><br />
		  <span id="sprytextfield1_5">
		  <input name="place" type="text" title="place"  />
		  <span class="textfieldRequiredMsg">Obligatoire</span></span>
          <br/>
          <table>
          <tr>
          <td>
            		<strong>Latitude</strong> <br/>
           </td>
           <td>
           			<strong>Longitude</strong> <br/>
           </td>
           </tr>
           <tr>
           <td>
            		
					<input name="latitude" type="text" title=		"code_language"  />
 					
                    <br/>
           </td>
           <td>    
            		
        
					<input name="longitude" type="text" title=		"code_language"  />
 					
            </td>
            </tr>
            </table>
            		(voir Torop : <a target="_blank" href="http://www.torop.net/coordonnees-gps.php">http://www.torop.net/coordonnees-gps.php</a>)<br />
 
  			</td>
 		</tr>
    	<tr>
	 		<td>

  
        		<strong>Liste des contributeurs *</strong><br />
           		<font color="#FF00FF"> Format : Nom, Prénom </font>
    			<br />
          		<table>
           			<tr>
          				<td> 
           					Dépositaire(s) *<br/>
           					(<b>1 personne</b> par ligne)
            			</td>
           				 <td>
				        <span id="sprytextarea1_1">
           					<textarea name="depositor" title="depositor" cols="45" rows="3"></textarea>
            				<span class="textareaRequiredMsg">Obligatoire</span></span> 
            			</td>
           			</tr>
            		<tr>
            			<td>
            				Chercheur(s) <br/> (<b>1 personne</b> par ligne)
             			</td>
             			<td>
	 						
            				<textarea name="researcher" title="researcher" cols="45" rows="3"></textarea>
 							
            			</td>
           			</tr>
            		<tr>
            			<td>
             				Locuteur(s) <br/>(<b>1 personne</b> par ligne - "anonyme" si besoin)
             			</td>
             			<td>
	 						
            				<textarea name="speaker" title="speaker" cols="45" rows="3"></textarea>
 							
          				</td>
           			</tr>
                    
                    <tr>
            			<td>
             				Preneur(s) de son <br/>(<b>1 personne</b> par ligne)
             			</td>
             			<td>
	 						
            				<textarea name="recorder" title="recorder" cols="45" rows="3"></textarea>
 							
          				</td>
           			</tr>
          			 
           			<tr>
            			<td>
             				Sponsor(s) <br/>(<b>1 personne</b> par ligne)
            			</td>
            			 <td>
	 						
            				<textarea name="sponsor" title="sponsor" cols="45" rows="3"></textarea>
 							
           				</td>
           			</tr>
            		<tr>
            			<td>
             				Interviewer(s) <br/>(<b>1 personne</b> par ligne)
            			</td>
             			<td>
	 						<span id="sprytextarea5">
            				<textarea name="interviewer" title="interviewer" cols="45" rows="3"></textarea>
 							<span class="textfieldRequiredMsg">Obligatoire</span></span>
           				</td>
           			</tr>
   				</table>
        
   			</td>
		  </tr> 
    		<tr>
	  			<td>
      				<strong>Type linguistique *</strong> <br />
                    
                    
                    
                    <span id="spryradio1_2">
  					<input name="linguistique" type="radio" value="primary_text" id="linguistique_0" title="text" />
 					<label>Texte</label>
					
					<input type="radio" name="linguistique"  value="lexicon" title="lexique" id="linguistique_1" />
					<label>Lexique</label>
					<br />

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
                    
                    
   	  
      			</td>
    		</tr>
    		<tr>
	  			<td>
      				<strong>Type du discours </strong>
      				<br />
      				
      				<input type="checkbox" name="discours[]" value="narrative"/>Narration
   					<input type="checkbox" name="discours[]" value="dialogue"/>Dialogue
   					<input type="checkbox" name="discours[]" value="singing"/>Chant
        			<input type="checkbox" name="discours[]" value="oratory"/>Discours oratoire
        			<input type="checkbox" name="discours[]" value="interactive_discourse"/>
					Discussion interactive
      				
        
 
<!--<span id="spryselect1">
			<select name="discours" title="discours" id="discours">
           <option value="narrative">Narration</option>
           <option value="dialogue">Dialogue</option>
           <option value="singing">Chant</option>
	    </select>
		<span class="selectRequiredMsg">Sélectionnez un élément.</span></span>-->
      			</td> 
    		</tr>
            <tr>
	  			<td>
      				<strong>Domaines linguistique </strong>
      				<br />
      				
      				<input type="checkbox" name="field[]" value="discourse_analysis"/>Analyse du discours
   					<input type="checkbox" name="field[]" value="lexicography"/>Lexicographie
   					<input type="checkbox" name="field[]" value="typology"/>Typologie
        			<input type="checkbox" name="field[]" value="text_and_corpus_linguistics"/>
        			Textes et corpus linguistiques
        			
  
      			</td> 
    		</tr>
   			 
	  <tr>
  				<td>
       			  <strong>Description</strong> (résumé du contenu de la ressource)<br />
    				
		 			<textarea name="resume" title="resume" id="resume" cols="45" rows="5"></textarea>
	 				<br/>
                    <input name="lang_resume" type="radio" value="en" id="lg_resume_0" title="en" />
 					<label>en</label>
					
					<input type="radio" name="lang_resume"  value="fr" title="fr" id="lg_resume_1" />
					<label>fr</label>
				
                    <input type="radio" name="lang_resume"  value="other" title="other" id="lg_resume_2" />
					<label>autre langue (code langue de la description)</label>
                    
                   
                    <input name="lang_resume_other" type="text" title="lg_other" size="3" />
				<br/>
				(CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />

                </td>
   		  </tr>
    		<tr>
 				<td>
                
                <strong>Format du fichier audio *</strong><br />
                
                
      <span id="spryradio1_3">


  					<input name="format" type="radio" value="x-wav" id="format_0" title="wav" />
 					<label>wav</label>
					
					<input type="radio" name="format"  value="mpeg" title="mp3" id="format_1" />
					<label>mp3 (déconseillé)</label>
					
                    <span class="radioRequiredMsg">Effectuez une sélection.</span></span>
                    <br/>
        
 				</td>
    		</tr>
			<tr>
    			<td>
        			<strong>Durée de l'enregistrement *</strong><br />
		    
        			<input name="hour" title="hour" type="text" size="2" maxlength="4"/>
        			h
               
		    
        			<input name="minute" title="minute" type="text" size="2" maxlength="4"/>
					min
                
					</span>
		    <span id="sprytextfield1_8">
    				<input name="second" title="second" type="text" size="2" maxlength="4"/>
   					sec
                    <span class="textfieldRequiredMsg">Obligatoire</span>
            		</span>
	  			</td>
			</tr>
             <tr>
  			   <td>
        			<strong>Source de l'enregistrement (bande, cassette...)<br /></strong>
                  
		  			
		  			<input name="source" title="source" type="text"  />
		  			
     
			   </td>
 			</tr>
            <tr>
	  			<td>
        			<strong>Date d'enregistrement <br /></strong>
                   
                    <font color="#FF00FF"> année - mois - jour </font>
                    <br/>
		  			
		  			<input name="year" title="date" type="text"  size="2" maxlength="4"/>
                    <input name="month" title="date" type="text"  size="2" maxlength="2"/>
                    <input name="day" title="date" type="text"  size="2" maxlength="2"/>
		  			
     
  				</td>
 			</tr>
           
    		<tr>
	  			<td>
        			<strong>Institut d'appartenance * <br/>(ex CNRS/LACITO pour le Lacito)<br />(nom personnel si pas d'institut d'appartenance)</strong><br />
      <span id="sprytextfield1_9">
		  			<input name="publisher"title="publisher" type="text"  />
		  			<span class="textfieldRequiredMsg">Obligatoire</span></span>
     
  				</td>
 			</tr>
   			<tr>
	 			<td>
        			<!--<strong>Collection </strong><br />
  			    
		  			<input name="collection"title="collection" type="text"  />-->
		  			
 
  				</td>
			</tr>
             <tr>
	  			<td>
      
       				<strong>Droit d'accès *</strong><br />
      <span id="spryradio1_4">


  					<input name="access" type="radio" value="access_ok" id="access_0" title="public" />
 					<label> Données publiques </label>
					<br />
					<input type="radio" name="access"  value="access_no" title="private" id="access_1" />
					<label>Données privées (aucun accès autorisé) </label>
					<br />

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
				</td>
   		  </tr>
           <tr>
	        <td><strong>Choix d'une licence (si accès public)</strong> 
	          	
                
	            <p><input type="radio" name="licence" value="by-nc"/>
                 Licence CreativeCommons BY-NC
                  <br/>
              
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/>  
                 *<strong>Modification</strong> la ressource
                 <br/>
                 <i><u>Obligation de :</u></i>
                 <br/>
                 * Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  <br/>
              </p>
                <p>
	            <input type="radio" name="licence" value="by-nc-sa"/>
                Licence CreativeCommons BY-NC-SA
                <br/>
               
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/>  
                 *<strong>Modification</strong> la ressource
                 <br/> 
                 <i><u>Obligation de :</u></i>
                 <br/>
                 *Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  <br/>
                  *Diffusion de la ressource modifiée avec la <strong>même licence</strong>
               
                </p>
               
               <p>
	            <input type="radio" name="licence" value="by-nc-nd"/>
                Licence CreativeCommons BY-NC-ND 
                 <br/>
               
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/> 
                   
                 
                 <i><u>Obligation de :</u></i>
                 <br/>
                 *Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  
	          
               </p>
             </td>
	  	</tr>
          <tr>
	  			<td>
        			<strong>Copyright *</strong>
                    <font color="#FF00FF"> Format : Nom, Prénom </font><br />
                    (du dépositaire ou du responsable de la ressource)<br/>
  			    <span id="sprytextfield1_10">
		  			<input name="copyright" title="copyright2" type="text"  />
		  			<span class="textfieldRequiredMsg">Obligatoire</span></span>
     
  				</td>
		  </tr>
          <tr>
	  			<td>
      				<strong>Collection </strong>
      				(ne rien cocher si aucun de ces 2 programmes)<br />
      				
      				<input type="checkbox" name="collection[]" value="Lacito"/>Lacito
                    <br/>
   					<input type="checkbox" name="collection[]" value="LanguesDeFrance"/>Langues de France / Corpus de la parole
                    
   				
            </td>
          </tr>
          <tr>
  				<td>
        			<strong>Note ou commentaires éventuels concernant l'enregistrement</strong><br />
    				
		 			<textarea name="note" title="note" id="note" cols="45" rows="5"></textarea>
	 				
                 <br />

                </td>
   		  </tr>
  			<tr>
        		<td align="center">
            		<INPUT type="submit" value="Créer le fichier">
        		</td>
		  </tr>
		</table>
	</form>
    </td>
    

	<td>

	<form id="form_metadata_text" name="form_metadata_text" action="xml_metadata.php" method="post">
    <input name="metadata" type="hidden" title="metadata" value="metadata_text"  />
		<table border="2" width="80%" height="80%" align="center">
  			<tr>
            <td>
            <strong>Nom du fichier d'annotations que décrit ces métadonnées <br/>(pas d'espace ni d'accent) *</strong><br/>
            <span id="sprytextfield2_1">
            <input name="annot_file2" type="text" title="audio_file"  />
            <span class="textfieldRequiredMsg">Obligatoire</span></span></td>
            </tr>
            <tr>
            <td>
            <strong>Nom du fichier audio auquel le fichier d'annotations est rattaché <br/>(pas d'espace ni d'accent) *</strong><br/>
            <span id="sprytextfield2_2">
            <input name="audio_file2" type="text" title="audio_file"  />
            <span class="textfieldRequiredMsg">Obligatoire</span></span></td>
            </tr>
  <tr>
  				<td>
	        		<strong>Titre *</strong><br />
	          		<span id="sprytextfield2_3">
	            	<input name="title2" type="text" title="title"  />
	            	<span class="textfieldRequiredMsg">Obligatoire</span></span>
                    <span id="spryradio2_1">
  					<input name="lang_title2" type="radio" value="en" id="lg_title_0" title="en" />
 					<label>en</label>
					
					<input type="radio" name="lang_title2"  value="fr" title="fr" id="lg_title_1" />
					<label>fr</label>
				
                    <input type="radio" name="lang_title2"  value="other" title="other" id="lg_title_2" />
					<label>autre (code langue du titre)</label>
				
                	<input name="lang_title_other2" type="text" title="lg_other" size="3"/>

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
                    <br/>
                    <br/>
                    <strong>Titre alternatif (dans une autre langue)</strong><br />
					
					<input name="title_alt2" type="text" title="title_alt"  />
                    

				  <input name="lang_alt2" type="radio" value="en" id="lg_title_alt_0" title="en" />
 					<label>en</label>
					
				  <input type="radio" name="lang_alt2"  value="fr" title="fr" id="lg_title_alt_1" />
					<label>fr</label>
				
                  <input type="radio" name="lang_alt2"  value="other" title="other" id="lg_title_alt_2" />
					<label>autre (code langue du titre alternatif)</label>
				
                	<input name="lang_alt_other2" type="text" title="lg_other" size="3"/>

					
              <br/>
              <br/>
                    
                    <strong>Autre titre alternatif (dans une autre langue)</strong><br />
			    
					<input name="title_alt_autre2" type="text" title="title_alt_autre2"  />
				<span class="textfieldRequiredMsg">Obligatoire</span></span>
                   
				  <input name="lang_title_alt_autre2" type="radio" value="en" id="lg_title_alt_autre2_0" title="en" />
 					<label>en</label>
					
				  <input type="radio" name="lang_title_alt_autre2"  value="fr" title="fr" id="lg_title_alt_autre2_1" />
					<label>fr</label>
				
                  <input type="radio" name="lang_title_alt_autre2"  value="other" title="other" id="lg_title_alt_autre2_2" />
					<label>autre (code langue du titre alternatif)</label>
                    
                   
                  <input name="lang_alt_autre2_other" type="text" title="lg_other" size="3" />
				<br/>
                    (CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />
 
                </td>
          </tr>
	      	<tr>
	        	<td><strong>Langue d'étude *</strong><br />
       		    <span id="sprytextfield2_4">
	            	<input name="language2" type="text" title="language"  />
	            	<span class="textfieldRequiredMsg">Obligatoire</span></span> <br/>
	          		<strong>Code langue * </strong> <br/>
          		  <span id="sprytextfield2_5">
	            <input name="code_language2" type="text" title="code_language"  />
	           		<span class="textfieldRequiredMsg">Obligatoire</span></span> 
                    <br/>                    (CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />
                </td>
	        </tr>
            <tr>
  				<td>
        			<strong>Langue de traduction 1</strong><br />
        			  
        			  <input name="lg_trad1" type="text" title="lg_trad1"  />
        			  
        			  <br/>
        			  <strong>Code langue</strong> <br/>
        			  
        			  <input name="code_language_trad1" type="text" title="code_language_trad1"  />
        			  
        			  <br/>
        			  <br/>
        			  <strong>Langue de traduction 2</strong><br />
        			  
        			  <input name="lg_trad2" type="text" title="lg_trad2"  />
        			  
        			  <br/>
        			  <strong>Code langue</strong> <br/>
        			  
        			  <input name="code_language_trad2" type="text" title="code_language_trad2"  />
        			  <br/>
        			  <br/>
        			  <strong>Langue de traduction 3</strong><br />
        			  
        			  <input name="lg_trad3" type="text" title="lg_trad3"  />
        			  
        			  <br/>
        			  <strong>Code langue</strong> <br/>
        			  
        			  <input name="code_language_trad3" type="text" title="code_language_trad3"  />
                      <br/>
                     (CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />
       			 
   			  </td>   	
   		 </tr>
	      	<tr>
	        	<td><strong>Lieu de l'enregistrement *</strong>      <font color="#FF00FF"> Format : pays, ville,.... </font><br />
	          		<span id="sprytextfield2_6">
                    <input name="place2" type="text" title="place"  />
                    <span class="textfieldRequiredMsg">Obligatoire</span></span>
                    <br/>
          <table>
          <tr>
          <td>
            		<strong>Latitude</strong> <br/>
           </td>
           <td>
           			<strong>Longitude</strong> <br/>
           </td>
           </tr>
           <tr>
           <td>
            		<input name="latitude" type="text" title=		"code_language"  />
 					
                    <br/>
           </td>
           <td>    
            		
        
					<input name="longitude" type="text" title=		"code_language"  />
            </td>
            </tr>
            </table>
            		(voir Torop : <a target="_blank" href="http://www.torop.net/coordonnees-gps.php">http://www.torop.net/coordonnees-gps.php</a>)<br />
 
                </td>
	        </tr>
	     	<tr>
	        	<td><strong>Liste des contributeurs *</strong><br />
	          	<font color="#FF00FF"> Format : Nom, Prénom </font> <br />
	          	<table>
	           		<tr>
	             		<td> Dépositaire(s) *<br/>
	                		(<b>1 personne</b> par ligne) 
                        </td>
	              		<td><span id="sprytextarea2_1">
	                		<textarea name="depositor2" title="depositor" cols="45" rows="3"></textarea>
	               			<span class="textareaRequiredMsg">Obligatoire</span></span>
                    	</td>
	              	</tr>
	           		<tr>
	              		<td> Chercheur(s) <br/>
	                		(<b>1 personne</b> par ligne) 
                        </td>
	              		<td>
	                		<textarea name="researcher2" title="researcher" cols="45" rows="3"></textarea>
	                		
                        </td>
	          		</tr>
	           		<tr>
	              		<td> Locuteur(s) <br/>
	                		(<b>1 personne</b> par ligne - "anonyme" si besoin) 
                        </td>
	              		<td>
	                <textarea name="speaker2" title="speaker" cols="45" rows="3"></textarea>
	               
                   		</td>
	              	</tr>
	            	<tr>
	              		<td> Annotateur(s) <br/>
	                		(<b>1 personne</b> par ligne) 
                        </td>
	              		<td>
	               			<textarea name="annotator2" title="annotator" cols="45" rows="3"></textarea>
	                		
                    	</td>
	              	</tr>
                    <tr>
	              		<td> Transcripteur(s) <br/>
	                		(<b>1 personne</b> par ligne) </td>
	              		<td><textarea name="transcriber2" title="transcriber" cols="45" rows="3"></textarea>
               		  </td>
	              	</tr>
                    <tr>
	              		<td> Traducteur(s) <br/>
	                		(<b>1 personne</b> par ligne) </td>
	              		<td>
	                		<textarea name="translator2" title="translator" cols="45" rows="3"></textarea>
               		  </td>
	              	</tr>
                    <tr>
	              		<td> Interviewer(s) <br/>
	                		(<b>1 personne</b> par ligne) </td>
	              		<td>
	                		<textarea name="interviewer2" title="interviewer" cols="45" rows="3"></textarea>
	                		</td>
           	    </tr>
	            	<tr>
	              		<td> Sponsor(s) <br/>
	                		(<b>1 personne</b> par ligne) </td>
	              		<td>
	                		<textarea name="sponsor2" title="sponsor" cols="45" rows="3"></textarea>
	                		</td>
	              	</tr>
	           		
	            </table>
           	</td>
	  	</tr>
	    <tr>
	        <td><strong>Type linguistique *</strong> <br />
	          	<span id="spryradio2_2">


  					<input name="linguistique2" type="radio" value="primary_text" id="linguistique_0" title="text" />
 					<label>Texte</label>
					
					<input type="radio" name="linguistique2"  value="lexicon" title="lexique" id="linguistique_1" />
					<label>Lexique</label>
					<br />

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
	  	</tr>
	    <tr>
	        <td><strong>Type du discours </strong> <br />
	          	
	            <input type="checkbox" name="discours2[]" value="narrative"/>
	            Narration
	            <input type="checkbox" name="discours2[]" value="dialogue"/>
	            Dialogue
	            <input type="checkbox" name="discours2[]" value="singing"/>
	            Chant
	            <input type="checkbox" name="discours2[]" value="oratory"/>
	            Discours oratoire
	            <input type="checkbox" name="discours2[]" value="interactive_discourse"/>
	            Discussion interactive
            </td>
	  	</tr>
	    
	    <tr>
	        <td><strong>Description</strong> (résumé du contenu de la ressource)<br />
	          	
	            <textarea name="resume2" title="resume2" id="resume2" cols="45" rows="5"></textarea>
	            <br/>
                 <input name="lang_resume2" type="radio" value="en" id="lg_resume_0" title="en" />
 					<label>en</label>
					
					<input type="radio" name="lang_resume2"  value="fr" title="fr" id="lg_resume_1" />
					<label>fr</label>
				
                    <input type="radio" name="lang_resume2"  value="other" title="other" id="lg_resume_2" />
					<label>autre langue (code langue de la description)</label>
                    
                   
                    <input name="lang_resume_other2" type="text" title="lg_other" size="3" />
				<br/>
				(CODE LANGUE : voir Ethnologue <a target="_blank" href="http://www.ethnologue.org/language_code_index.asp">http://www.ethnologue.org/language_code_index.asp</a>)<br />

            </td>
	    </tr>
	    <tr>
	        <td><strong>Format du fichier *</strong> <br />
	          	<span id="spryradio2_3">
					<input name="format2" type="radio" value="xml" id="format_0" title="xml" />
 					<label>XML</label>
                    
  					<input name="format2" type="radio" value="pdf" id="format_0" title="pdf" />
 					<label>PDF</label>
					
					<input type="radio" name="format2"  value="text" title="text" id="format_1" />
					<label>Texte</label>
					<br />

					<span class="radioRequiredMsg">Effectuez une sélection.</span></span>
        
            </td>
	    </tr>
        
	    <tr>
	        <td><strong>Institut d'appartenance * <br/>(ex CNRS/LACITO pour le Lacito)<br />(nom personnel si pas d'institut d'appartenance)</strong><br />
	          	<span id="sprytextfield2_7">
	            <input name="publisher2" title="publisher" type="text"  />
	            <span class="textfieldRequiredMsg">Obligatoire</span></span>
            </td>
	    </tr>
	    <!--<tr>
	        <td><strong>Collection *</strong><br />
            <span id="sprytextfield8_1">
            <input name="collection2" title="collection" type="text"  />
	         	<span class="textfieldRequiredMsg">Obligatoire</span></span>
            </td>
	    </tr>-->
        <tr>
	        <td><strong>Droit d'accès *</strong><br />
       	    <span id="spryradio2_4">
	            <input name="access2" type="radio" value="access_ok" id="licence_2" title="public" />
	            <label> Données publiques </label>
	            <br />
	            <input type="radio" name="access2"  value="access_no" title="private" id="licence_3" />
	            <label>Données privées (aucun accès autorisé) </label>
	            <br />
	            <span class="radioRequiredMsg">Effectuez une sélection.</span></span>
            </td>
	    </tr>
        <tr>
	        <td><strong>Choix d'une licence (si accès public)</strong> 
	          	
                
	            <p><input type="radio" name="licence2" value="by-nc"/>
                 Licence CreativeCommons BY-NC
                  <br/>
              
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/>  
                 *<strong>Modification</strong> la ressource
                 <br/>
                 <i><u>Obligation de :</u></i>
                 <br/>
                 * Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  <br/>
                  </p>
                <p>
	            <input type="radio" name="licence2" value="by-nc-sa"/>
                Licence CreativeCommons BY-NC-SA
                <br/>
               
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/>  
                 *<strong>Modification</strong> la ressource
                 <br/> 
                 <i><u>Obligation de :</u></i>
                 <br/>
                 *Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  <br/>
                  *Diffusion de la ressource modifiée avec la <strong>même licence</strong>
               
                </p>
               
               <p>
	            <input type="radio" name="licence2" value="by-nc-nd"/>
                Licence CreativeCommons BY-NC-ND 
                 <br/>
               
	            <i><u>Autorisation de :</u></i>
                <br/>
                 *<strong>Diffusion</strong> la ressource
                 <br/> 
                   
                 
                 <i><u>Obligation de :</u></i>
                 <br/>
                 *Utilisation à des <strong>fins non commerciales</strong>
                  <br/>
                  *<strong>Citation</strong> de l'auteur
                  
	          
               </p>
               </td>
	  	</tr>
        <tr>
	  			<td>
        			<strong>Copyright *</strong>
                    <font color="#FF00FF"> Format : Nom, Prénom </font><br />
                    (du dépositaire ou du responsable de la ressource)<br/>
  			    <span id="sprytextfield2_8">
		  			<input name="copyright2" title="copyright2" type="text"  />
		  			<span class="textfieldRequiredMsg">Obligatoire</span></span>
     
  				</td>
 			</tr>
            <tr>
	  			<td>
      				<strong>Collection </strong>
      				(ne rien cocher si aucun de ces 2 programmes)<br />
      				
      				<input type="checkbox" name="collection2[]" value="Lacito"/>Lacito
                    <br/>
   					<input type="checkbox" name="collection2[]" value="LanguesDeFrance"/>Langues de France / Corpus de la parole
   				
                 </td>
                 </tr>
                  <tr>
  				<td>
        			<strong>Note ou commentaires éventuels concernant le fichier d'annotations</strong><br />
    				
		 			<textarea name="note2" title="note2" id="note2" cols="45" rows="5"></textarea>
	 				
                 <br />

                </td>
   		  </tr>
	    <tr>
	        <td align="center"><input type="submit" value="Créer le fichier" />
            </td>
	    </tr>
	   	
    </table>
	</form>
</td>
</tr>
</table>



<script type="text/javascript">
var sprytextfield1_1 = new Spry.Widget.ValidationTextField("sprytextfield1_1");
var sprytextfield1_2 = new Spry.Widget.ValidationTextField("sprytextfield1_2");
var sprytextfield1_3 = new Spry.Widget.ValidationTextField("sprytextfield1_3");
var sprytextfield1_4 = new Spry.Widget.ValidationTextField("sprytextfield1_4");
var sprytextfield1_5 = new Spry.Widget.ValidationTextField("sprytextfield1_5");
var sprytextfield1_6 = new Spry.Widget.ValidationTextField("sprytextfield1_6");
var sprytextfield1_7 = new Spry.Widget.ValidationTextField("sprytextfield1_7");
var sprytextfield1_8 = new Spry.Widget.ValidationTextField("sprytextfield1_8");
var sprytextfield1_9 = new Spry.Widget.ValidationTextField("sprytextfield1_9");
var sprytextfield1_10 = new Spry.Widget.ValidationTextField("sprytextfield1_10");



var sprytextfield2_1 = new Spry.Widget.ValidationTextField("sprytextfield2_1");
var sprytextfield2_2 = new Spry.Widget.ValidationTextField("sprytextfield2_2");
var sprytextfield2_3 = new Spry.Widget.ValidationTextField("sprytextfield2_3");
var sprytextfield2_4 = new Spry.Widget.ValidationTextField("sprytextfield2_4");
var sprytextfield2_5 = new Spry.Widget.ValidationTextField("sprytextfield2_5");
var sprytextfield2_6 = new Spry.Widget.ValidationTextField("sprytextfield2_6");
var sprytextfield2_7 = new Spry.Widget.ValidationTextField("sprytextfield2_7");
var sprytextfield2_8 = new Spry.Widget.ValidationTextField("sprytextfield2_8");



var spryradio1_1 = new Spry.Widget.ValidationRadio("spryradio1_1");
var spryradio1_2 = new Spry.Widget.ValidationRadio("spryradio1_2");
var spryradio1_3 = new Spry.Widget.ValidationRadio("spryradio1_3");
var spryradio1_4 = new Spry.Widget.ValidationRadio("spryradio1_4");



var spryradio2_1 = new Spry.Widget.ValidationRadio("spryradio2_1");
var spryradio2_2 = new Spry.Widget.ValidationRadio("spryradio2_2");
var spryradio2_3 = new Spry.Widget.ValidationRadio("spryradio2_3");
var spryradio2_4 = new Spry.Widget.ValidationRadio("spryradio2_4");




var sprytextarea1_1 = new Spry.Widget.ValidationTextarea("sprytextarea1_1");




var sprytextarea2_1 = new Spry.Widget.ValidationTextarea("sprytextarea2_1");



</script>
</body>
</html>