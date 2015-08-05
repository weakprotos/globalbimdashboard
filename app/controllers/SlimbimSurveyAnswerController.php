<?php

class SlimbimSurveyAnswerController extends \BaseController {



	public function index()
	{
		$slimtestvalues = Slimtestvalue::all();
		return View::make('slimbimsurvey.index')->with('answers',$answers);	
	}

	public function create()
	{


		$user = User::find(Auth::user()->id);

			if( $user->confirmed == 2){
				Session::flash('message','Sorry. You&#39;ve already participated in this survey. Can&#39;t participate twice.');
				return Redirect::to('slimbimsurvey/submitted');

			}else if( $user->confirmed == 1){



		$language = Input::get('language');

		if($language == "english"){

			$data = array(
		
				'language' => $language,
				
				'h1' => '2015 BIM Adoption and Implementation Survey',
				
				'employee'=>'Employees',
			
				'q1' => '1. Approximately how many employees are currently working for your company? ',
				'q2' => '2. In your opinion, what percentage of projects are currently using BIM in your country (where you are currently working if you are working abroad)?',
				'q3' => '3. In which phase do you think BIM is in your country (where you are currently working if you are working abroad) in terms of technology maturity?',
				'q3a' => 'a. Technology Trigger: The period during which a technology attracts interest from the media and industry. Usable products may not yet exist.',
				'q3b' => 'b. Peak of Inflated Expectations: The period during which the expectations related to the technology are at their peak due to optimistic anticipation.',
				'q3c' => 'c. Trough of Disillusionment: The period during which the limitations of the technology are acknowledged.',
				'q3d' => 'd. Slope of Enlightenment: The period during which practical investment is made in the technology despite pessimistic responses from the media and industry.',
				'q3e' => 'e. Plateau of Productivity: The period during which the technology matures and is operating stably in the appropriate markets.',

				'q4' => '4. What is the main type of user who has recently started using BIM in your country (where you are currently working if you are working abroad)?',
				'q4a' => 'a. Innovators: The very first users who adopt a technology before it is known.',
				'q4b' => 'b. Early adopters: The users who adopt a technology when it is known.',
				'q4c' => 'c. Early majority: The users who adopt a technology before the average member of society.',
				'q4d' => 'd. Late majority: The users who adopt a technology after the average member of society.',
				'q4e' => 'e. Laggards: The users who adopt a technology in the late stages of its existence.',

				'q5' => '5. How would you evaluate the BIM adoption status in your country (where you are currently working if you are working abroad) at each phase of the following construction lifecycles: ',
				'q5th1' => 'Lifecycle',
				'q5th2' => 'Perceived adoption rate (%)',
				'q5th3' => 'Tech. maturity (1-5)(ref. Question 4)',
				'q5th4' => 'Type of recent users(1-5)(ref. Question 5)',
				'q5th5' => 'Opinion',

				'q5r1' => 'Plan',
				'q5r2' => 'Schematic design (SD)',
				'q5r3' => 'Design development (DD)',
				'q5r4' => 'Construction design (CD)',
				'q5r5' => 'Construction',
				'q5r6' => 'Operation and maintenance',




				'o1a' => 'Technology Trigger',
				'o1b' => 'Peak of Inflated Expectations',
				'o1c' => 'Trough of Disillusionment',
				'o1d' => 'Slope of Enlightenment',
				'o1e' => 'Plateau of Productivity',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovators',
				'o2b' => 'Early adopters',
				'o2c' => 'Early majority',
				'o2d' => 'Late majority',
				'o2e' => 'Laggards',
				'o2x' => 'Select',


				
				'q6' => '6. The following is a list of the obstacles to BIM adoption. Please evaluate the impact of each item from 1 to 5 where 1 is the lowest impact and 5 is the highest impact.',
				'q6th1' => 'Obstacle',
				'q6th2' => 'Impact(1-5)',
				'q6th3' => 'Opinion',
				'q6r1' => 'Low design fee',
				'q6r2' => 'High levels of competition due to a frozen construction market',
				'q6r3' => 'Market led by contractors',
				'q6r4' => 'Overly frequent design changes',
				'q6r5' => 'Late decisions after hard deadlines',
				'q6r6' => 'Low-quality construction documents',
				'q6r7' => 'Communication difficulties due to a restricted hierarchical social structure',
				'q6r8' => 'Excessive client demands ',
				'q6r9' => 'Insufficient support from headquarters',
				'q6r10' => 'Ignorance of, or resistance to, a new technology',
				'q6r11' => 'Low budget and short project duration due to the acquisition of bad projects',
				'q6r12' => 'Insufficient incentives for BIM-based design',
				'q6r13' => 'Lack of subcontractors with BIM capabilities',
				'q6r14' => 'Lack of employees with BIM capabilities',
				'q6r15' => 'Insufficient BIM-compatible content available for my needs',
				'q6r16' => 'Other (please explain)',



				'q7' => '7. Do you use BIM?',
				'yes' => 'Yes',
				'no' => 'No',
				'q7a' => 'I have been using BIM for',
				'q7b' => 'year(s).',

				'parta' => 'Part [A] Questions for non-BIM users',
				'qa1' => '1. Please rate the importance of each of the following reasons for not adopting BIM in your company using a scale of 1 to 5, with 1 being no impact on your decision to not use BIM and 5 being the greatest impact on your decision to not use BIM:',
				'qa1th1' => 'Reasons for not adopting BIM',
				'qa1th2' => 'Impact(1-5)',
				'qa1th3' => 'Opinion',
				'qa1r1' => 'The functionality doesn&#39;t apply well enough to what we do.',
				'qa1r2' => 'We haven&#39;t had sufficient time to evaluate it.',
				'qa1r3' => 'We believe the current methods we use are better.',
				'qa1r4' => 'There is not enough demand from clients and/or other firms to use BIM for the projects.',
				'qa1r5' => 'The software is too expensive.',
				'qa1r6' => 'The required hardware upgrades are too expensive.',
				'qa1r7' => 'The software is too difficult to use.',
				'qa1r8' => 'Insufficient training is available.',
				'qa1r9' => 'Insufficient BIM-compatible content is available for my needs.',
				'qa1r10' => 'BIM has poor interoperability with CAD applications.',
				'qa1r11' => 'We have concerns about insurance and/or liability.',
				'qa2' => '2. Using a scale of 1 to 5, please rate the following items in terms of their impact on your organization&#39;s decision to adopt BIM in the future, with 1 being no impact on your decision to adopt BIM and 5 being the greatest impact on your decision to adopt BIM.',
				'qa2th1' => 'Expected benefits of BIM adoption',
				'qa2th2' => 'Impact(1-5)',
				'qa2th3' => 'Opinion',
				'qa2r1' => 'Improved ability to do sustainable design and construction',
				'qa2r2' => 'Improved scheduling capabilities',
				'qa2r3' => 'Improved budgeting and cost estimating capabilities.',
				'qa2r4' => 'Increased ability to use lean construction techniques (lean construction techniques following the principles set forth by the Lean Construction Institute to minimize waste and optimize planning)',
				'qa2r5' => 'Improved communication between all parties in the design and construction processes',
				'qa2r6' => 'Less time drafting, more time designing',
				'qa2r7' => 'Improved code checking and/or compliance',
				'qa2r8' => 'Modification of the design parameters',
				'qa2r9' => 'Reduced construction costs',
				'qa2r10' => 'Reduced construction schedule',
				'qa2r11' => 'Reducing litigation and/or insurance claims',
				'qa2r12' => 'Safer worksites',
				'qa2r13' => 'Owner demand for BIM on their projects',
				'qa2r14' => 'Reduced necessity for, and number of, information requests',
				'qa2r15' => 'Reduced number of field coordination problems',
				'qa2r16' => 'More accurate construction documents',
				'qa2r17' => 'Improved operations maintenance and facility management',
				'qa2r18' => 'Improved ability to create digital fabrication(Digital fabrication is a technology that automatically produces construction materials or components, such as steel frames, ducts, exterior panels, and partitions, by inputting the digital model into the computer model)',
				'qa3' => 'How important do you believe BIM will be to the industry in five years time?',
				'qa3a' => 'a. No importance',
				'qa3b' => 'b. Low importance',
				'qa3c' => 'c. Moderate importance',
				'qa3d' => 'd. High importance',
				'qa3e' => 'e. Very high importance',
				'partb' => 'Part [B] Questions for BIM users',
				'qb1' => '1. What percentage of your company&#39;s projects use BIM?',
				'qb2' => 'Which best describes your company&#39;s level of BIM expertise?',
				'qb2a' => 'a. Beginner',
				'qb2b' => 'b. Moderate',
				'qb2c' => 'c. Advanced',
				'qb2d' => 'd. Expert',
				'qb3' => 'The list below shows the major BIM services. Please indicate all the BIM services that you think are used in your company.',
				'qb3th1' => 'BIM services',
				'qb3th2' => 'Being used',
				'qb3th3' => 'Opinion',
				'qb3r1' => 'Existing Conditions Modeling',
				'qb3r2' => 'Cost/Quantity Estimation',
				'qb3r3' => 'Phase Planning (Scheduling)',
				'qb3r4' => 'Spatial Planning',
				'qb3r5' => 'Site Analysis',
				'qb3r6' => 'Design Modeling/Authoring',
				'qb3r7' => 'Structural Analysis',
				'qb3r8' => 'Energy Analysis (Mechanical, Lighting, and so on)',
				'qb3r9' => '3D Coordination',
				'qb3r10' => '3D Control and Planning',
				'qb3r11' => 'Record Modeling',
				'qb3r12' => 'Maintenance Scheduling',
				'qb3r13' => 'Building System Analysis'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "french"){
			$data = array(
		
				'language' => $language,
				
				'h1' => 'Enquête sur l’adoption et la mise en œuvre du BIM 2015',
				
				'employee'=>'',
			
				'q1' => '1.	Combien d&#39;employés compte environ votre entreprise ?',
				'q2' => '2.	À votre avis, quel est le pourcentage de projets qui utilisent actuellement le BIM dans votre pays (ou dans le pays où vous travaillez) ? ',
				'q3' => '3.	D’après vous, à quelle étape le BIM se trouve-t-il en ce moment dans votre pays (ou dans le pays où vous travaillez) du point de vue de la maturité technologique ?',
				'q3a' => 'a.	Lancement de la technologie : Phase pendant laquelle une technologie suscite l&#39;intérêt des médias et du secteur. Il se peut qu&#39;aucun produit utilisable ne soit encore disponible.',
				'q3b' => 'b.	Pic d&#39;expectative : Phase pendant laquelle les attentes liées à la technologie sont à leur apogée, poussées par une vague d&#39;optimisme en anticipation.',
				'q3c' => 'c.	Creux de la désillusion : Phase pendant laquelle on prend conscience des limites de la technologie.',
				'q3d' => 'd.	Pente d&#39;illumination : Phase pendant laquelle des investissements concrets sont effectués malgré des réactions pessimistes de la part des médias et du secteur.',
				'q3e' => 'e.	Pallier de productivité : Phase pendant laquelle la technologie murit et est employée de manière stable sur les marchés appropriés. ',

				'q4' => '4.	Quel est le principal type d&#39;utilisateur qui a récemment commencé à utiliser le BIM dans votre pays (ou dans le pays où vous travaillez) ?',
				'q4a' => 'a.	Innovateurs : Les premiers utilisateurs qui adoptent une technologie avant qu&#39;elle ne soit connue.',
				'q4b' => 'b.	Adopteurs précoces : Les utilisateurs qui adoptent une technologie lorsqu&#39;elle devient connue.',
				'q4c' => 'c.	Majorité précoce : Les utilisateurs qui adoptent une technologie avant le citoyen moyen.',
				'q4d' => 'd.	La majorité tardive : Les utilisateurs qui adoptent une technologie après le citoyen moyen.',
				'q4e' => 'e.	Retardataires : Les utilisateurs qui adoptent une technologie à la fin des étapes de son existence.',

				'q5' => '5.	Comment évaluez-vous l&#39;état de l&#39;adoption de BIM dans votre pays (ou dans le pays où vous travaillez) lors de chacune de ces phases du cycle de construction :',
				'q5th1' => 'Cycle de vie',
				'q5th2' => 'Taux d&#39;adoption perçu (%)',
				'q5th3' => 'Maturité technologique (1-5)(cf. question 3)',
				'q5th4' => 'Type d&#39;utilisateurs récents(1-5)(cf. question 4)',
				'q5th5' => 'Opinion',

				'q5r1' => 'Plan',
				'q5r2' => 'Conception des plans (SD)',
				'q5r3' => 'Élaboration du design (DD)',
				'q5r4' => 'Conception de la construction (CD)',
				'q5r5' => 'Construction',
				'q5r6' => 'Exploitation et maintenance',




				'o1a' => 'Lancement de la technologie',
				'o1b' => 'Pic d&#39;expectative',
				'o1c' => 'Creux de la désillusion',
				'o1d' => 'Pente d&#39;illumination',
				'o1e' => 'Pallier de productivité',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovateurs',
				'o2b' => 'Adopteurs précoces',
				'o2c' => 'Majorité précoce',
				'o2d' => 'La majorité tardive',
				'o2e' => 'Retardataires',
				'o2x' => 'Select',


				
				'q6' => '6.	Ce qui suit est une liste d&#39;obstacles éventuels à l&#39;adoption du BIM. Veuillez évaluer l&#39;impact de chaque article de “1” à “5”, où “1” a l&#39;impacte le plus faible et “5” a l&#39;impact le plus fort.',
				'q6th1' => 'Obstacle',
				'q6th2' => 'Impact(1-5)',
				'q6th3' => 'Opinion',
				'q6r1' => 'Baisse des frais de conception',
				'q6r2' => 'Haut niveau de concurrence à cause d&#39;un marché de la construction en stagnation',
				'q6r3' => 'Marché dirigé par des sous-traitants',
				'q6r4' => 'Trop grande fréquence des modifications de la conception',
				'q6r5' => 'Tardiveté des décisions après des délais serrés',
				'q6r6' => 'Mauvaise qualité des documents de construction',
				'q6r7' => 'Difficultés de communication dues à une structure hiérarchique trop restreinte',
				'q6r8' => 'Exigences excessives de la part des clients ',
				'q6r9' => 'Insuffisance du soutien fourni par le siège',
				'q6r10' => 'Ignorance de ou résistance à la nouvelle technologie',
				'q6r11' => 'Étroitesse des budgets et des délais à cause de l&#39;acquisition de mauvais projets',
				'q6r12' => 'Insuffisance des motivations pour passer à la conception BIM',
				'q6r13' => 'Manque de sous-traitants sachant employer le BIM',
				'q6r14' => 'Manque d&#39;employés sachant employer le BIM',
				'q6r15' => 'Insuffisance de la disponibilité du contenu compatible avec le BIM par rapport à mes besoins.',
				'q6r16' => 'Autres (veuillez expliquer)',



				'q7' => '7.	Utilisez-vous le BIM ?',
				'yes' => 'Oui, j&#39;',
				'no' => 'Non.',
				'q7a' => 'utilise le BIM depuis ',
				'q7b' => 'an(s).',

				'parta' => 'Partie [A] : Questions pour les non-utilisateurs du BIM',
				'qa1' => '1.	Parmi les éventuelles causes suivantes, veuillez évaluer l&#39;importance de chacune d&#39;entre elles dans votre décision de ne pas adopter le BIM dans votre entreprise, en utilisant une échelle de 1 à 5, « 1 » signifiant « Aucune influence sur notre décision de ne pas adopter le BIM », et « 5 » signifiant « Facteur déterminant notre décision de ne pas adopter le BIM » :',
				'qa1th1' => 'Raisons de la non-adoption du BIM',
				'qa1th2' => 'Impact(1-5)',
				'qa1th3' => 'Opinion',
				'qa1r1' => 'Ses fonctionnalités ne correspondent pas assez à ce que nous faisons.',
				'qa1r2' => 'Nous n&#39;avons pas encore eu le temps de l&#39;évaluer.',
				'qa1r3' => 'Nous pensons que les méthodes que nous utilisons actuellement sont meilleures.',
				'qa1r4' => 'Il n&#39;y a pas assez de demandes de la part de clients et/ou d&#39;autres entreprises pour l&#39;utilisation du BIM dans nos projets.',
				'qa1r5' => 'Le logiciel coute trop cher.',
				'qa1r6' => 'Les mises à niveau du matériel informatique nécessaires coutent trop chères.',
				'qa1r7' => 'Le logiciel est trop difficile à utiliser.',
				'qa1r8' => 'Il n&#39;y pas assez de formations disponibles.',
				'qa1r9' => 'Trop peu de contenu compatible avec mes besoins est disponible.',
				'qa1r10' => 'BIM fonctionne mal avec les applications de CAO.',
				'qa1r11' => 'Nous avons des soucis au niveau de l&#39;assurance et/ou de la responsabilité.',
				'qa2' => '2.	Veuillez évaluer les points suivants en fonction de leur influence potentielle sur une éventuelle décision de votre organisation à adopter le BIM à l&#39;avenir, en utilisant une échelle de 1 à 5, « 1 » signifiant « Aucun impact sur une éventuelle décision d&#39;adopter le BIM » et « 5 » signifiant « Influence décisive sur une éventuelle décision d&#39;adopter le BIM ».',
				'qa2th1' => 'Avantages potentiels de l&#39;adoption du BIM',
				'qa2th2' => 'Impact(1-5)',
				'qa2th3' => 'Opinion',
				'qa2r1' => 'Amélioration des capacités à faire des conceptions et constructions durables',
				'qa2r2' => 'Amélioration des capacités de planification',
				'qa2r3' => 'Amélioration de la budgétisation et des capacités d&#39;estimation des couts',
				'qa2r4' => 'Amélioration des capacités d&#39;utilisation de techniques de construction allégée (techniques de construction allégée selon les principes énoncés par l&#39;Institut pour la construction allégée afin de réduire les déchets et d&#39;optimiser la planification)',
				'qa2r5' => 'Amélioration de la communication entre toutes les parties dans les processus de conception et de construction',
				'qa2r6' => 'Moins de temps passé sur les brouillons, plus de temps pour la conception',
				'qa2r7' => 'Amélioration de la vérification de code et/ou de la conformité',
				'qa2r8' => 'Modification des paramètres de conception',
				'qa2r9' => 'Réduction des couts de construction',
				'qa2r10' => 'Réduction de la planification de construction',
				'qa2r11' => 'Réduction des litiges et/ou des règlements d&#39;assurance',
				'qa2r12' => 'Meilleure sécurité sur le chantier',
				'qa2r13' => 'Certains propriétaires exigent l&#39;adoption du BIM pour leurs projets',
				'qa2r14' => 'Réduction des besoins en et du nombre de demandes d&#39;information ',
				'qa2r15' => 'Réduction du nombre de problèmes de coordination sur le terrain',
				'qa2r16' => 'Documents de construction plus précis',
				'qa2r17' => 'Amélioration de l&#39;entretien des opérations et de la gestion des installations',
				'qa2r18' => 'Amélioration de la capacité de fabrication numérique (la fabrication numérique est une technologie qui produit automatiquement des matériaux ou composants de construction, tels que des cadres en acier, conduits, panneaux extérieurs et cloisons par saisie du modèle numérique dans l&#39;ordinateur)',
				'qa3' => '3.	À votre avis, quelle sera l&#39;importance du BIM dans le secteur d&#39;ici cinq ans ?',
				'qa3a' => 'a.	Sans importance',
				'qa3b' => 'b.	Faible importance  ',
				'qa3c' => 'c.	Importance moyenne',
				'qa3d' => 'd.	Grande importance ',
				'qa3e' => 'e.	Très grande importance',
				'partb' => 'Partie [B] : Questions pour les utilisateurs du BIM',
				'qb1' => '1.	Quel est la part de projets réalisés par votre entreprise en utilisant le BIM ? ',
				'qb2' => '2.	Quel est le terme décrivant le mieux le niveau d&#39;expertise BIM de votre entreprise ?',
				'qb2a' => 'a.	Débutant ',
				'qb2b' => 'b.	Moyen ',
				'qb2c' => 'c.	Avancé',
				'qb2d' => 'd.	Expert ',
				'qb3' => '3.	La liste ci-dessous indique les principaux services BIM. Veuillez indiquer tous les services BIM qui sont selon vous utilisés dans votre entreprise.',
				'qb3th1' => 'Services BIM',
				'qb3th2' => 'Utilisé ?',
				'qb3th3' => 'Opinion',
				'qb3r1' => 'Modélisation des conditions existantes',
				'qb3r2' => 'Évaluation des couts et quantités',
				'qb3r3' => 'Phase de planification (programmation)',
				'qb3r4' => 'Planification spatiale',
				'qb3r5' => 'Analyse de site',
				'qb3r6' => 'Modélisation/création du design',
				'qb3r7' => 'Analyse structurelle',
				'qb3r8' => 'Analyse énergétique (mécanique, éclairage et ainsi de suite)',
				'qb3r9' => 'Coordination 3D',
				'qb3r10' => 'Contrôle et planification 3D',
				'qb3r11' => 'Modélisation des enregistrements',
				'qb3r12' => 'Planification de l&#39;entretien',
				'qb3r13' => 'Analyse des systèmes de construction'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "chinese"){
			$data = array(
		
				'language' => $language,
				
				'employee'=>'名',
				
				'h1' => '2015年BIM採用及實施情況的調查',
			
				'q1' => '1. 目前貴公司約有多少名員工？',
				'q2' => '2. 您認為在您的國家（若您在海外工作，您目前身處的國家）有百分之多少的項目正在使用 BIM？',
				'q3' => '3. 就技術成熟度而言，您認為 BIM 在您的國家（若您在海外工作，您目前身處的國家）內處於哪一個階段？',
				'q3a' => 'a.	技術萌芽期：這段時期有一種技術令傳媒和業界產生興趣，未必已有可使用的產品存在。',
				'q3b' => 'b.	期望膨脹頂峰：這段時期內由於樂觀的預測，對有關技術的期望處於最高水平。',
				'q3c' => 'c.	泡沫化的谷底期：這段時期內該技術的限制是眾所公認的。',
				'q3d' => 'd.	穩步爬升的光明期：這段時期內儘管傳媒和業界作出悲觀的反應，有人對技術作出實際的投資。 ',
				'q3e' => 'e.	生產平穩期：這段時期內技術已成熟，並在合適的市場穩定地運作。',

				'q4' => '4. 在您的國家（若您在海外工作，您目前身處的國家）內，最近開始使用 BIM 的主要使用者是屬於哪一類使用者？',
				'q4a' => 'a.	創新者：在新技術為人所知之前率先採用它的第一批人',
				'q4b' => 'b.	早期採用者：在新技術為人所知之時採用它的使用者',
				'q4c' => 'c.	早期採用群體：比社會上一般人更早採用新技術的使用者',
				'q4d' => 'd.	後期採用群體：比社會上一般人更遲採用新技術的使用者',
				'q4e' => 'e.	落後者：在技術存在已久時採用它的使用者',

				'q5' => '5. 對於在您的國家（若您在海外工作，您目前身處的國家）內，BIM 在建築生命周期的下列每個階段的採用情況，您有怎樣的評價？ ',
				'q5th1' => '生命周期',
				'q5th2' => '感知採用率 (%)',
				'q5th3' => '技術成熟度 (1–5)(參考第4條問題)',
				'q5th4' => '最近使用者的類型(1–5)(參考第5條問題)',
				'q5th5' => '意見',

				'q5r1' => '規劃',
				'q5r2' => '大網設計 (SD)',
				'q5r3' => '設計發展 (DD)',
				'q5r4' => '建築設計 (CD)',
				'q5r5' => '建築',
				'q5r6' => '營運和維修',




				'o1a' => '技術萌芽期',
				'o1b' => '期望膨脹頂峰',
				'o1c' => '泡沫化的谷底期',
				'o1d' => '穩步爬升的光明期',
				'o1e' => '生產平穩期',
				'o1x' => '選擇',
				'select' => '選擇',

				'o2a' => '創新者',
				'o2b' => '生產平穩期',
				'o2c' => '早期採用群體',
				'o2d' => '後期採用群體',
				'o2e' => '落後者',
				'o2x' => '選擇',


				
				'q6' => '6. 下列是採用 BIM 的障礙。請以 1 至 5 的等級來評估每個障礙的影響力；1 代表最低度的影響，5 是最高度。',
				'q6th1' => '障礙',
				'q6th2' => '影響(1–5)',
				'q6th3' => '意見',
				'q6r1' => '偏低的設計收費',
				'q6r2' => '由於建築市場處於凍結狀態而產生的高度競爭',
				'q6r3' => '由承建商領導的市場',
				'q6r4' => '過度頻繁的設計變動',
				'q6r5' => '硬性限期過後的遲來決定',
				'q6r6' => '低質量的建築文件',
				'q6r7' => '限制性分層社會結構所導致的溝通困難',
				'q6r8' => '過量的客戶要求 ',
				'q6r9' => '來自總部的支援不足',
				'q6r10' => '對新技術的無知或抗拒態度',
				'q6r11' => '由於獲得不良項目所致的低預算和項目完成的短期限',
				'q6r12' => '基於 BIM 的設計沒有足夠誘因支持',
				'q6r13' => '缺乏具使用 BIM 能力的次承建商',
				'q6r14' => '缺乏具使用 BIM 能力的員工',
				'q6r15' => '符合我需求而與 BIM 兼容的內容不足',
				'q6r16' => '其他（請解釋）',



				'q7' => '7. 您是否使用 BIM？',
				'yes' => '是',
				'no' => '否',
				'q7a' => '我使用 BIM 已有 ',
				'q7b' => '年。',

				'parta' => '[A] 不使用 BIM 者須回答的問題',
				'qa1' => '1. 對於貴公司不採用 BIM，請以 1 至 5 的等級為下列每一個原因評估其重要性；1 代表對您不使用 BIM 的決定沒有影響力，而 5 代表對您不使用 BIM 的決定有最大的影響力：',
				'qa1th1' => '不採用 BIM 的原因',
				'qa1th2' => '影響(1-5)',
				'qa1th3' => '意見',
				'qa1r1' => '功能不大適用於我們的業務。',
				'qa1r2' => '我們沒有足夠時間對它進行評估。',
				'qa1r3' => '我們相信目前所使用的方法較佳。',
				'qa1r4' => '客戶及／其他公司對於項目使用 BIM 的需求不足。',
				'qa1r5' => '軟件太昂貴。',
				'qa1r6' => '要進行的硬件升級太昂貴。',
				'qa1r7' => '該軟件太難使用。',
				'qa1r8' => '沒有足夠的培訓提供。',
				'qa1r9' => '符合我需求而與 BIM 兼容的內容不足。',
				'qa1r10' => 'BIM 與 CAD 應用程式的互用性很低。',
				'qa1r11' => '我們對保險及／或責任有疑慮。',
				'qa2' => '2. 對於貴機構將來採用 BIM 的決定，以 1 至 5 的等級為下列每項好處的影響力評分；1 代表對您採用 BIM 的決定沒有影響力，而 5 代表對您採用 BIM 的決定有最大的影響力。',
				'qa2th1' => '採用 BIM 的預期好處',
				'qa2th2' => '影響(1-5)',
				'qa2th3' => '意見',
				'qa2r1' => '提高進行可持續設計和建築的能力',
				'qa2r2' => '提高排程能力',
				'qa2r3' => '提高制訂預算和估計成本的能力',
				'qa2r4' => '更有能力使用精益建築技術 (精益建築技術遵照由Lean Construction Institute 所提出的原則，使廢料減至最少，並將規劃最優化。) ',
				'qa2r5' => '加強設計和建築過程中所有人之間的溝通',
				'qa2r6' => '減少起草時間，有更多的設計時間',
				'qa2r7' => '加強代碼查核及／或合規能力',
				'qa2r8' => '設計參數的修改',
				'qa2r9' => '建築成本減少',
				'qa2r10' => '施工所需時間縮短',
				'qa2r11' => '減少訴訟及／或保險索償',
				'qa2r12' => '更安全的工地',
				'qa2r13' => '委託人對其項目使用 BIM 的需求',
				'qa2r14' => '減少索取資料要求的必要性和數量 ',
				'qa2r15' => '減少實地協調問題的數量',
				'qa2r16' => '更準確的建築文件',
				'qa2r17' => '更佳的營運維修和設施管理',
				'qa2r18' => '提高製作數碼建模 (digital fabrication) 的能力（數碼建模是一種技術，透過向電腦模型輸入數碼模型，自動地產生例如鋼架、導管、外板和隔板等建築材料或元件。）',
				'qa3' => '3. 您相信 5 年後 BIM 對業界將有多重要？',
				'qa3a' => 'a.	不重要 ',
				'qa3b' => 'b.	低度重要  ',
				'qa3c' => 'c.	中度重要 ',
				'qa3d' => 'd.	高度重要',
				'qa3e' => 'e.	非常重要',
				'partb' => '[B] BIM 使用者須回答的問題',
				'qb1' => '1. 貴公司有多少百分比的項目是使用 BIM？ ',
				'qb2' => '2. 下列哪一項最適合形容貴公司對 BIM 的專門程度？',
				'qb2a' => 'a.	入門',
				'qb2b' => 'b.	中等',
				'qb2c' => 'c.	高級',
				'qb2d' => 'd.	專家',
				'qb3' => '3. 下列是主要的 BIM 服務。請指出您認為貴公司有使用的全部 BIM 服務。',
				'qb3th1' => 'BIM 服務',
				'qb3th2' => '正在使用',
				'qb3th3' => '意見',
				'qb3r1' => '現存狀況建模',
				'qb3r2' => '成本／數量估計',
				'qb3r3' => '分期規劃 (排程)',
				'qb3r4' => '空間規劃',
				'qb3r5' => '工地分析',
				'qb3r6' => '設計建模／創作',
				'qb3r7' => '結構分析',
				'qb3r8' => '能源分析 (機械、照明等等)',
				'qb3r9' => '3D 協調',
				'qb3r10' => '3D 控制與規劃',
				'qb3r11' => '記錄建模',
				'qb3r12' => '維修排程',
				'qb3r13' => '建築系統分析'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "korean"){
			$data = array(
		
				'language' => $language,
				
				'employee'=>'명',
				
				'h1' => '2015 건축사 BIM 도입현황 설문',
			
				'q1' => '1. 귀사의 전체 직원수가 대략 몇 명인가요?',
				'q2' => '2. 우리나라 전체적으로는 BIM을 전체 프로젝트의 대략 몇 퍼센트 정도 사용하고 있다고 느끼십니까?',
				'q3' => '3. 우리나라의 현재 BIM 기술 단계를 평가한다면, 아래 어느 단계라고 보십니까?',
				'q3a' => 'a. 태동단계: 기술이 언론과 대중의 관심을 받기 시작하는 시기',
				'q3b' => 'b. 거품단계: 장밋빛 전망으로 기대감이 최고조에 이르는 단계',
				'q3c' => 'c. 거품제거단계: 적용사례가 늘면서 한계점 등이 드러나는 단계',
				'q3d' => 'd. 재조명단계: 시장, 언론은 냉담하나 실질적인 투자가 이루어지는 단계',
				'q3e' => 'e. 안정 단계: 기술이 성숙하고 안정적으로 보급, 확산되는 단계',

				'q4' => '4. 우리나라에서 최근 BIM을 사용하기 시작하는 사람들은 다음 중 주로 어떤 유형의 사람들이라고 생각하십니까? 1번부터 5번으로 갈수록 기술도입을 늦게 하는 유형의 사람들입니다.',
				'q4a' => 'a. 혁신자: 기술이 일반적으로 알려지기도 전에 제일 먼저 기술을 도입하는 사람들',
				'q4b' => 'b. 얼리어답터(빠른 도입자): 기술이 알려질 무렵 바로 기술을 도입하는 사람들',
				'q4c' => 'c. 초기도입자: 평균보다 도입이 빠른 다수의 사용자들',
				'q4d' => 'd. 후기도입자: 평균보다 도입이 늦은 다수의 사용자들',
				'q4e' => 'e. 늦깎이 도입자: 다른 사람이 기술을 다 도입하고 가장 마지막 단계에서 기술을 도입하는 사람들',

				'q5' => '5. 프로젝트 생애주기별로 봤을 때, 귀하께서 생각하시는 우리나라의 각 단계별 BIM 도입정도를 평가해 주십시오.',
				'q5th1' => '생애주기',
				'q5th2' => '느껴지는 BIM 활용정도 (%)',
				'q5th3' => '기술단계(1~5)(4번 문항 참조)',
				'q5th4' => '최근 BIM을 사용하기 시작한 사용자 유형(1~5)(5번 문항 참조)',
				'q5th5' => '비고/의견',

				'q5r1' => '기획단계',
				'q5r2' => '계획단계 (SD)',
				'q5r3' => '기본설계 (DD)',
				'q5r4' => '실시설계 (CD)',
				'q5r5' => '시공',
				'q5r6' => '운영 및 유지관리',




				'o1a' => '태동단계',
				'o1b' => '거품단계',
				'o1c' => '거품제거단계',
				'o1d' => '재조명단계',
				'o1e' => '안정 단계',
				'o1x' => '선택',
				'select' => '선택',

				'o2a' => '혁신자',
				'o2b' => '얼리어답터(빠른 도입자)',
				'o2c' => '초기도입자',
				'o2d' => '후기도입자',
				'o2e' => '늦깎이 도입자',
				'o2x' => '선택',


				
				'q6' => '6. BIM 활성화 요소 및 중요도 평가, 다음은 우리나라가 BIM도입을 위해 극복해야 할 문제점들을 나열한 것입니다. 아래 항목의 영향도를 평가해 주십시오. 1번부터 5번으로 갈수록 영향도가 높은 것입니다.(중요도 : 1=중요하지 않음, 5=매우 중요함)',
				'q6th1' => '극복 요소',
				'q6th2' => '중요도(1–5)',
				'q6th3' => '비고/의견',
				'q6r1' => '낮은 설계비',
				'q6r2' => '건설시장 위축으로 인한 과다 경쟁',
				'q6r3' => '건설사 주도의 시장구조',
				'q6r4' => '과도하게 잦은 설계변경',
				'q6r5' => '최대기한을 넘기는 늦은 의사결정',
				'q6r6' => '설계도서의 낮은 완성도 및 품질',
				'q6r7' => '상달하복적 구조로 인한 의사소통의 어려움',
				'q6r8' => '무리한 발주처의 요구 ',
				'q6r9' => '본사의 지원부족',
				'q6r10' => '현장의 의지부족 또는 신기술 도입에 대한 저항감',
				'q6r11' => '무리한 수주로 인한 예산 및 공기 부족',
				'q6r12' => 'BIM 설계에 대한 보상 부족',
				'q6r13' => 'BIM 능력을 가진 협력업체 부족',
				'q6r14' => 'BIM 능력을 가진 직원 부족',
				'q6r15' => 'BIM 소프트웨어들의 국내 필요기능 및 라이브러리 지원 부족',
				'q6r16' => '기타',



				'q7' => '7. BIM을 사용하고 계십니까?',
				'yes' => '그렇다',
				'no' => '아니다',
				'q7a' => '이미 BIM을 ',
				'q7b' => '년째 사용 중이다.',

				'parta' => '[A] BIM 비사용자 문항',
				'qa1' => '1. 아래는 BIM을 도입하지 않는 이유들입니다. 귀사에서 BIM 도입을 하지 않는 이유에 가장 근접하다고 생각되면 5점을, 가장 거리가 멀다고 생각되면 1점을 주십시오.',
				'qa1th1' => '도입하지 않는 이유',
				'qa1th2' => '중요도(1-5)',
				'qa1th3' => '비고/의견',
				'qa1r1' => '기능이 우리가 하는 일에 적용이 잘 안 된다',
				'qa1r2' => '아직 충분히 검토해볼 시간이 없었다',
				'qa1r3' => '현재 방식이 더 낫다',
				'qa1r4' => '거래처의 요구가 없다',
				'qa1r5' => '소프트웨어가 너무 비싸다',
				'qa1r6' => '필요한 하드웨어(컴퓨터가) 너무 비싸다',
				'qa1r7' => '소프트웨어 사용이 어렵다',
				'qa1r8' => '소프트웨어 교육이 부족하다',
				'qa1r9' => '내가 필요한 BIM 관련한 라이브러리 등이 부족하다',
				'qa1r10' => 'CAD 시스템과 BIM 시스템의 정보호환이 원활치 않다',
				'qa1r11' => '보험과 책임문제에 대한 우려가 있다',
				'qa2' => '2. 아래는 일반적으로 BIM을 도입하는 목적들입니다. 향후 귀사에서 BIM 도입을 고려한다면, BIM 도입에 영향을 가장 많이 미칠 수 있다고 생각되는 항목은 5점, 영향을 거의 미치지 않을 것이라고 생각이 되면 1점을 주십시오',
				'qa2th1' => '도입 목적',
				'qa2th2' => '중요도(1-5)',
				'qa2th3' => '비고/의견',
				
				'qa2r1' => '지속 가능한 설계와 시공을 할 수 있는 향상된 능력',
				'qa2r2' => '일정/공정관리 능력 향상',
				'qa2r3' => '예산 계획 및 견적 능력 향상',
				'qa2r4' => '린 건설 기술을 활용할 수 있는 능력 향상(린 건설기술은 낭비를 줄이고 계획을 최적화하기 위해 린건설협회에서 정의한 원칙들에 기반한 건설관리 기술을 말합니다.)',
				'qa2r5' => '설계, 시공자 등 모든 프로젝트 참여간의 의사소통 향상',
				'qa2r6' => '도면작성 시간이 줄어듬에 따른 설계(디자인) 시간 증가',
				'qa2r7' => '법규나 설계기준 검토능력 향상',
				'qa2r8' => '설계변수의 수정 용이성 증대',
				'qa2r9' => '공사비의 절감',
				'qa2r10' => '공사시간의 감소',
				'qa2r11' => '법적 또는 보험 소송의 감소',
				'qa2r12' => '현장의 안전성 증진',
				'qa2r13' => '발주처의 요구에 따른 도입',
				'qa2r14' => '정보요청 관련 공문 (REF: Request for Information)의 감소',
				'qa2r15' => '현장 조율 문제의 감소',
				'qa2r16' => '시공도서의 정확성 향상',
				'qa2r17' => '향상된 시설물 관리 및 운영',
				'qa2r18' => '디지털 패브리케이션 (digital fabrication) 능력향상(디지털 패브리케이션(digital fabrication)이란 컴퓨터 모델로부터 얻은 디지털 정보를 자동화 생산기계에 입력하여 철골, 덕트, 외장패널, 파티션 등 건설자재나 부품을 자동으로 생산하는 기술을 말합니다.)',
				
				
				'qa3' => '3. 5년 뒤 건설산업에서 BIM이 얼마나 중요해질 것이라고 예상하십니까?',
				'qa3a' => 'a. 전혀 중요하지 않다',
				'qa3b' => 'b. 좀 중요해진다',
				'qa3c' => 'c. 꽤 중요해진다',
				'qa3d' => 'd. 매우 중요해진다',
				'qa3e' => 'e. 필수적이 된다',
				'partb' => '[B] BIM 사용자 문항',
				'qb1' => '1. 현재 회사 전체 프로젝트 중 대략 몇 퍼센트 정도 BIM을 적용하고 있습니까? ',
				'qb2' => '2. 본인 회사의 BIM 전문성은 어느 수준이라고 생각하십니까?',
				'qb2a' => 'a.	초보',
				'qb2b' => 'b.	중간',
				'qb2c' => 'c.	고급',
				'qb2d' => 'd.	전문가',
				'qb3' => '3. 아래 표는 주요한 BIM 기능에 대한 내용입니다. 현재 주요근무지에서 주로 사용하는 BIM 기능들을 모두 선택해주십시오',
				'qb3th1' => 'BIM 기능',
				'qb3th2' => '사용 여부',
				'qb3th3' => '비고/의견',
				'qb3r1' => '현장 또는 기존 건물 현황분석을 위한 모델링',
				'qb3r2' => '견적 및 물량산출',
				'qb3r3' => '공정계획',
				'qb3r4' => '공간계획',
				'qb3r5' => '대지분석',
				'qb3r6' => '설계모델링',
				'qb3r7' => '구조해석',
				'qb3r8' => '에너지 분석 (설비, 조명 등)',
				'qb3r9' => '3D 간섭 조율',
				'qb3r10' => '3차원 기반의 작업통제 및 계획',
				'qb3r11' => '준공상태기록을 위한 모델링',
				'qb3r12' => '유지보수 계획',
				'qb3r13' => '건물 시스템 (설비, 외피, 에너지 등) 분석'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "russian"){
			$data = array(
		
				'language' => $language,
				
				'h1' => 'Опрос 2015 года о внедрении и применении BIM (информационного моделирования строительства)',
				
				'employee'=>'',
			
				'q1' => '1. Примерно сколько сотрудников в настоящее время работает в вашей компании? ',
				'q2' => '2. На ваш взгляд, в настоящее время в каком проценте проектов в вашей стране используется BIM (там, где вы сейчас работаете, если вы работаете за границей)?',
				'q3' => '3. По вашему мнению, на какой стадии сейчас находится внедрение BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей) с точки зрения зрелости технологии?',
				'q3a' => 'a.	Технологический триггер. Период, в течение которого технология вызывает интерес у средств массовой информации и промышленности. Пригодные к использованию продукты могут еще не существовать.',
				'q3b' => 'b.	Пик завышенных ожиданий. Период, в течение которого ожидания, связанные с технологией, находятся на пике из-за оптимистичных ожиданий.',
				'q3c' => 'c.	Избавление от иллюзий. Период, в течение которого подтверждаются ограничения технологии.',
				'q3d' => 'd.	Преодоление недостатков. Период осуществления практических инвестиций в технологию, несмотря на пессимистическую реакцию средств массовой информации и отрасли. ',
				'q3e' => 'e.	Плато продуктивности. Период, во время которого технология становится зрелой и стабильно работает на соответствующих рынках.',

				'q4' => '4. Какой основной тип пользователя, который недавно начал использовать BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей)?',
				'q4a' => 'a.	Новаторы. Пользователи, которые самыми первыми воспринимают технологи., прежде чем она становится известной.',
				'q4b' => 'b.	Ранние последователи. Пользователи, которые воспринимают технологию, как только она становится известной.',
				'q4c' => 'c.	Раннее большинство. Пользователи, которые воспринимают технологию до того, как ее воспримет средний член общества.',
				'q4d' => 'd.	Позднее большинство. Пользователи, которые воспринимают технологию после того, как ее воспримет средний член общества.',
				'q4e' => 'e.	Поздние последователи. Пользователи, которые воспринимают технологию на поздних стадиях ее существования.',

				'q5' => '5. Как вы оцениваете состояние внедрения BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей) на каждом этапе следующих жизненных циклов строительства: ',
				'q5th1' => 'Жизненный цикл',
				'q5th2' => 'Воспринимаемый коэффициент внедрения (%)',
				'q5th3' => 'Технологическая зрелость (1-5)(см. вопрос 4)',
				'q5th4' => 'Тип недавних пользователей(1-5)(см. вопрос 5)',
				'q5th5' => 'Мнение',

				'q5r1' => 'Планирование',
				'q5r2' => 'Эскизный проект (ЭП)',
				'q5r3' => 'Разработка проекта (РП)',
				'q5r4' => 'Строительный проект (СП)',
				'q5r5' => 'Строительство',
				'q5r6' => 'Эксплуатация и техническое обслуживание:',




				'o1a' => 'Технологический триггер',
				'o1b' => 'Пик завышенных ожиданий',
				'o1c' => 'Избавление от иллюзий',
				'o1d' => 'Преодоление недостатков',
				'o1e' => 'Плато продуктивности',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Новаторы',
				'o2b' => 'Ранние последователи',
				'o2c' => 'Раннее большинство',
				'o2d' => 'Позднее большинство',
				'o2e' => 'Поздние последователи',
				'o2x' => 'Select',


				
				'q6' => '6. Ниже приведен список препятствий внедрению BIM. Просьба оценить влияние каждого элемента по шкале от 1 до 5, где 1 — самое слабое влияние, а 5 — самое сильное влияние.',
				'q6th1' => 'Препятствие',
				'q6th2' => 'Влияние(1-5)',
				'q6th3' => 'Мнение',
				'q6r1' => 'Низкая плата за проектирование',
				'q6r2' => 'Высокий уровень конкуренции в результате застоя на строительном рынке',
				'q6r3' => 'Условия на рынке диктуют подрядчики',
				'q6r4' => 'Слишком частые изменения проекта',
				'q6r5' => 'Запоздалые решения после истечения жестких сроков',
				'q6r6' => 'Низкое качество строительной документации',
				'q6r7' => 'Коммуникационные трудности из-за ограниченной иерархической социальной структуры',
				'q6r8' => 'Чрезмерные требования заказчика ',
				'q6r9' => 'Недостаточная поддержка со стороны штаб-квартиры',
				'q6r10' => 'Незнание или сопротивление новой технологии',
				'q6r11' => 'Низкий бюджет и малая продолжительность проекта из-за приобретения плохих проектов',
				'q6r12' => 'Недостаточные стимулы для проектирования на основе BIM',
				'q6r13' => 'Недостаточное число субподрядчиков с возможностями использования BIM',
				'q6r14' => 'Недостаточное число работников, умеющих использовать BIM',
				'q6r15' => 'Недостаток совместимого с BIM контента для моих потребностей',
				'q6r16' => 'Прочее (просьба пояснить)',



				'q7' => '7. Используете ли вы BIM?',
				'yes' => 'Да',
				'no' => 'Нет',
				'q7a' => 'я использую BIM ',
				'q7b' => 'год (года, лет).',

				'parta' => 'Вопросы части [А] для тех, кто не использует BIM',
				'qa1' => '1. Пожалуйста, оцените важность каждой из следующих причин отказа от внедрения BIM в вашей компании, используя шкалу от 1 до 5, где 1 —отсутствие влияния на ваше решение не использовать BIM, а 5 — наибольшее влияние на ваше решение не использовать BIM:',
				'qa1th1' => 'Причины отказа от BIM',
				'qa1th2' => 'Влияние(1-5)',
				'qa1th3' => 'Мнение',
				'qa1r1' => 'Функциональность не слишком важна в том, что мы делаем.',
				'qa1r2' => 'У нас не было достаточно времени для оценки BIM.',
				'qa1r3' => 'Мы считаем, что нынешние методы, которые мы используем, лучше.',
				'qa1r4' => 'Недостаточный спрос со стороны заказчиков и/или других фирм на использование BIM в проектах.',
				'qa1r5' => 'Слишком высокая стоимость программного обеспечения.',
				'qa1r6' => 'Слишком высокая стоимость необходимой модернизации оборудования.',
				'qa1r7' => 'Программное обеспечение слишком сложное в использовании.',
				'qa1r8' => 'Недостаточность доступного обучения.',
				'qa1r9' => 'Недостаток совместимого с BIM контента для моих потребностей.',
				'qa1r10' => 'Плохая операционная совместимость BIM с CAD-приложениями.',
				'qa1r11' => 'У нас есть опасения относительно страхования и/или ответственности.',
				'qa2' => '2. Используя шкалу от 1 до 5, пожалуйста, оцените следующие пункты с точки зрения их воздействия на решение вашей организации о внедрении BIM в будущем, где 1 — это отсутствие влияния на ваше решение о внедрении BIM, а 5 — наибольшее влияние на ваше решение о внедрении BIM.',
				'qa2th1' => 'Ожидаемые выгоды от внедрения BIM',
				'qa2th2' => 'Влияние(1-5)',
				'qa2th3' => 'Мнение',
				'qa2r1' => 'Лучшие возможности осуществления экологичного проектирования и строительства',
				'qa2r2' => 'Лучшие возможности составления графиков',
				'qa2r3' => 'Лучшие возможности бюджетирования и составления смет расходов.',
				'qa2r4' => 'Лучшие возможности использования методов бережливого строительства (методы бережливого строительства основаны на принципах, которые сформулированы Институтом бережливого строительства, и позволяют до минимума сократить отходы и оптимизировать планирование)',
				'qa2r5' => 'Улучшение коммуникации между всеми сторонами в процессе проектирования и строительства',
				'qa2r6' => 'Поскольку меньше времени уделяется подготовке эскизов, больше времени остается на проектирование',
				'qa2r7' => 'Улучшенная проверка соответствия кодексам и/или стандартам',
				'qa2r8' => 'Изменение параметров проектирования',
				'qa2r9' => 'Сокращение затрат на строительство',
				'qa2r10' => 'Сокращение запланированных сроков строительства ',
				'qa2r11' => 'Сокращение числа судебных и/или страховых претензий',
				'qa2r12' => 'Более безопасные строительные площадки',
				'qa2r13' => 'Спрос со стороны владельцев на использование BIM в их проектах',
				'qa2r14' => 'Снижение необходимости в запросах информации и их количества',
				'qa2r15' => 'Уменьшение числа проблем с координацией на местах',
				'qa2r16' => 'Более точная проектно-сметная документация',
				'qa2r17' => 'Улучшение текущего обслуживания и управления объектом',
				'qa2r18' => 'Улучшенные возможности цифрового производства(Цифровое производство — это технология, которая позволяет автоматически производить строительные материалы и компоненты, такие как стальные конструкции, воздуховоды, внешние панели и перегородки, посредством ввода цифровой модели в компьютерную модель)',
				'qa3' => '3. По вашему мнению, каков будет уровень важности BIM в отрасли через пять лет?',
				'qa3a' => 'a.	Не важно',
				'qa3b' => 'b.	Низкая важность',
				'qa3c' => 'c.	Умеренная важность',
				'qa3d' => 'd.	Высокая важность',
				'qa3e' => 'e.	Очень высокая важность',
				'partb' => 'Вопросы части [B] для пользователей BIM',
				'qb1' => '1. В каком проценте проектов вашей компании используется BIM? ',
				'qb2' => '2. Что лучше всего описывает уровень опыта вашей компании в сфере BIM?',
				'qb2a' => 'a.	Начальный',
				'qb2b' => 'b.	Средний',
				'qb2c' => 'c.	Продвинутый',
				'qb2d' => 'd.	Экспертный',
				'qb3' => '3. Ниже приведен список основных услуг BIM. Пожалуйста, укажите все услуги BIM, которые, как вы считаете, используются в вашей компании.',
				'qb3th1' => 'Услуги BIM',
				'qb3th2' => 'Используется',
				'qb3th3' => 'Мнение',
				'qb3r1' => 'Моделирование текущих условий',
				'qb3r2' => 'Оценка затрат/количеств',
				'qb3r3' => 'Этап планирования (составления графика)',
				'qb3r4' => 'Пространственное планирование',
				'qb3r5' => 'Анализ площадки',
				'qb3r6' => 'Моделирование/авторская разработка проекта',
				'qb3r7' => 'Расчет конструкции',
				'qb3r8' => 'Энергоанализ (механический, освещения и т.д.)',
				'qb3r9' => '3D-координация',
				'qb3r10' => '3D-контроль и планирование',
				'qb3r11' => 'Моделирование учетной документации',
				'qb3r12' => 'Планирование технического обслуживания',
				'qb3r13' => 'Анализ конструктивной системы здания'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "arabic"){
			$data = array(
		
				'language' => $language,
				
				'h1' => 'استطلاع الرأي لاعتماد وتطبيق نمذجة معلومات المبنى "BIM" لعام 2015',
				
				'employee'=>'Employees',
			
				'q1' => '1. كم يبلغ عدد الموظفين الذين يعملون حالياً في شركتك تقريباً ؟ ',
				'q2' => '2. في رأيك الشخصي، ما هي النسبة المئوية للمشروعات التي تستخدم نمذجة معلومات المبنى BIM حالياً في بلدك     (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك)؟',
				'q3' => '3. إلى أي مرحلة باعتقادك وصلت نمذجة معلومات المبنى BIM في بلدك (حيث تعمل حالياً إن كنت تعمل خارج بلدك) من ناحية نضوج التكنولوجيا؟',
				'q3a' => 'أ. إطلاق التكنولوجيا: وهي الفترة التي تجذب فيها التكنولوجيا اهتمام وسائل الإعلام ورجال الصناعة. المنتجات القابلة للاستخدام قد تكون غير موجودة بعد.',
				'q3b' => 'ب. قمة التوقعات المضخمة: وهي الفترة التي تكون فيها التوقعات المتعلقة بالتكنولوجيا في ذروتها، كنتيجة للتوقعات المتفائلة.',
				'q3c' => 'ج. هُوة خيبة الأمل: وهي الفترة التي يتم فيها معرفة وإدراك قيود التكنولوجيا.',
				'q3d' => 'د. منحدر التنوير: وهي الفترة التي يتم فيها إجراء الاستثمار العملي في التكنولوجيا، بالرغم من ردود الأفعال المتشائمة من وسائل الإعلام ورجال الصناعة.',
				'q3e' => 'ه. هضبة الإنتاجية: وهي الفترة التي تنضج فيها التكنولوجيا، وتعمل بشكل مستقر في الأسواق المناسبة.',

				'q4' => '4. ما هو نوع المستخدم الرئيسي الذي بدأ حديثاً في اعتماد أو تبني نمذجة معلومات المبنى BIM في بلدك (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك)؟',
				'q4a' => 'أ. المبدعون: وهم المستخدمون الأوائل الذين يقومون بإستخدام تكنولوجيا معينة قبل أن تصبح معروفة.',
				'q4b' => 'ب. المُعتمِدِون الأوائل: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة عندما تصبح معروفة.',
				'q4c' => 'ج. الأغلبية الأوائل: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة قبل أفراد الطبقة المتوسطة من المجتمع.',
				'q4d' => 'د. الغالبية المتأخرة: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة بعد أفراد الطبقة المتوسطة من المجتمع..',
				'q4e' => 'ه. المتقاعسون: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة في مراحل متأخرة من وجودها.',

				'q5' => '5. كيف تُقيم وضع اعتماد وتبني نمذجة معلومات المبنى BIM في بلدك (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك) وهي مرحلة دورات الحياة الإنشائية التالية:',
				'q5th1' => 'دورة الحياة',
				'q5th2' => 'معدل الاعتماد المتوقع (%)',
				'q5th3' => 'نضوج التكنولوجيا(1-5)(راجع السؤال 4)',
				'q5th4' => 'نوع المستخدمون الجدد(1-5)(راجع السؤال 5)',
				'q5th5' => 'رأيك',

				'q5r1' => 'الخطة ',
				'q5r2' => 'التصمي التخطيطي   (SD)',
				'q5r3' => 'تطوير التصميم (DD)',
				'q5r4' => 'التصميم الإنشائي (CD)',
				'q5r5' => 'الإنشاءات',
				'q5r6' => 'التشغيل والصيانة',




				'o1a' => 'إطلاق التكنولوجيا',
				'o1b' => 'قمة التوقعات المضخمة',
				'o1c' => 'هُوة خيبة الأمل',
				'o1d' => 'منحدر التنوير',
				'o1e' => 'هضبة الإنتاجية',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'المبدعون',
				'o2b' => 'المُعتمِدِون الأوائل',
				'o2c' => 'الأغلبية الأوائل',
				'o2d' => 'الغالبية المتأخرة',
				'o2e' => 'المتقاعسون',
				'o2x' => 'Select',


				
				'q6' => '6. فيما يلي مجموعة من العوائق لعملية اعتماد نمذجة معلومات المبنى BIM. برجاء تقييم كل بند من 1 إلى 5 حيث رقم 1 هو أقل درجة تأثير، ورقم 5 هو أعلى درجة تأثير.',
				'q6th1' => 'العائق',
				'q6th2' => 'التأثير(1-5)',
				'q6th3' => 'رأيك',
				'q6r1' => 'رسم تصميم منخفض',
				'q6r2' => 'مستويات عالية من المنافسة نتيجة كساد سوق الإنشاءات ',
				'q6r3' => 'سيطرة المقاولين على السوق',
				'q6r4' => 'تغيير التصميم مراراً وتكراراً بشكل مبالغ فيه',
				'q6r5' => 'قرارات متأخرة بعد المواعيد النهائية الصعبة ',
				'q6r6' => 'وثائق  الإنشاءات ذات جودة منخفضة',
				'q6r7' => 'صعوبات الاتصال نتيجة بنية اجتماعية طبقية مُقيدة',
				'q6r8' => 'المطالب المفرطة  للعميل',
				'q6r9' => 'الدعم غير الكافي من المركز الرئيسي',
				'q6r10' => 'تجاهل أو مقاومة التكنولوجيا الجديدة',
				'q6r11' => 'الميزانية محدودة ، وفترة المشروع قصيرة نتيجة الاستحواذ على مشاريع سيئة',
				'q6r12' => 'الحوافز غير كافية لتصميم المبني على أساس نمذجة معلومات المبنى BIM',
				'q6r13' => 'نقص المقاولين الفرعيين ممن لديهم قدرات نمذجة معلومات المبنى BIM',
				'q6r14' => 'نقص الموظفين ممن لديهم قدرات نمذجة معلومات المبنى BIM',
				'q6r15' => 'المحتوى المتاح لاحتياجاتي والمتوافق مع نمذجة معلومات المبنى BIM غير كاف',
				'q6r16' => 'أخرى (برجاء التوضيح)',



				'q7' => '7. هل تستخدم نمذجة معلومات المبنى BIM؟',
				'yes' => 'نعم',
				'no' => 'لا',
				'q7a' => 'لقد كنت أستخدم نمذجة معلومات المبنى BIM لمدة ',
				'q7b' => 'سنة (سنوات)',

				'parta' => 'الجزء ]أ[ أسئلة لغير مستخدمي نمذجة معلومات المبنى BIM',
				'qa1' => '1. برجاء تقييم أهمية كل سبب من الأسباب التالية لعدم اعتماد نمذجة معلومات المبنى BIM في شركتك، مستخدماً المقياس من 1 إلى 5، حيث رقم 1 يعني عدم وجود تأثير على قرارك بسبب عدم استخدامك لنمذجة معلومات المبنى BIM، و رقم 5 يعني وجود أكبر تأثير على قرارك بسبب عدم استخدامك لنمذجة معلومات المبنى BIM:',
				'qa1th1' => 'أسباب عدم الاعتماد على BIM',
				'qa1th2' => 'التأثير(1-5)',
				'qa1th3' => 'رأيك',
				'qa1r1' => 'وظائف النمذجة لا تنطبق جيداً بشكل كاف على ما نفعله.',
				'qa1r2' => 'لا نمتلك الوقت الكافي لتقييمها. ',
				'qa1r3' => 'نحن نؤمن بأن الوسائل التي نستخدمها حالياً أفضل.',
				'qa1r4' => 'لا يوجد طلب كاف من العملاء و/أو الشركات الأخرى لكي نستخدم نمذجة معلومات المبنى BIM من أجل المشاريع التي ننفذها.',
				'qa1r5' => 'البرنامج مكلف للغاية.',
				'qa1r6' => 'التحديثات المطلوبة للأجهزة مكلفة للغاية.',
				'qa1r7' => 'البرنامج صعب جداً في استخدامه.',
				'qa1r8' => 'التدريب المتاح غير كاف.',
				'qa1r9' => 'المحتوى المتوافق مع نمذجة معلومات المبنى BIM والمتاح لاحتياجاتي غير كاف.',
				'qa1r10' => 'نمذجة معلومات المبنى BIM لديها قابلية تشغيل بيني ضعيفة مع تطبيقات التصميم بإستخدام الحاسوب (CAD)',
				'qa1r11' => 'لدينا مخاوف بشأن التأمين و/أو المسئولية.',
				'qa2' => '2. برجاء تقييم البنود التالية من ناحية تأثيرها على قرار مؤسستك فيما يتعلق باعتمادك على نمذجة معلومات المبنى BIM في المستقبل، مستخدماً المقياس من 1 إلى 5، حيث رقم 1 يعني عدم وجود تأثير على قرارك لكي تعتمد على نمذجة معلومات المبنى BIM في المستقبل، ورقم 5 يعني وجود أعظم تأثير على قرارك لكي تعتمد على نمذجة معلومات المبنى BIM في المستقبل.',
				'qa2th1' => 'المنافع المتوقعة جراء إعتماد BIM',
				'qa2th2' => 'التأثير(1-5)',
				'qa2th3' => 'رأيك',
				'qa2r1' => 'تحسين القدرة على القيام بتصميم وإنشاء مستدام.',
				'qa2r2' => 'تحسين قدرات الجدولة ',
				'qa2r3' => 'تحسين قدرات وضع الميزانية وتقدير التكاليف.',
				'qa2r4' => 'مقدرة مرتفعة على استخدام تقنيات الإنشاء الرشيق (تعتمد تقنيات الإنشاء الرشيق على مجموعة القواعد المنصوص عليها من جانب معهد الإنشاء الرشيق من أجل تقليل الفاقد وتحسين التخطيط)',
				'qa2r5' => 'اتصالات مُحسَّنَة بين جميع الأطراف في التصميم وعمليات الإنشاء',
				'qa2r6' => 'وقت أقل في وضع المسودات، ووقت أكثر للتصميم',
				'qa2r7' => 'فحص كود مُحسَّن و/أو التزام مُحسَّن بالكود',
				'qa2r8' => 'تعديل معايير التصميم',
				'qa2r9' => 'تكاليف إنشاء مُخفّضَة',
				'qa2r10' => 'جدول إنشاء مُخفَّض',
				'qa2r11' => 'تقليل الدعاوى القضائية و/أو مطالبات التأمين ',
				'qa2r12' => 'مواقع عمل أكثر أماناً ',
				'qa2r13' => 'مطالبة المالك بنمذجة معلومات المبنى BIM في مشروعاتهم',
				'qa2r14' => 'تقليل الاضطرار لطلبات المعلومات، وتقليل عددها',
				'qa2r15' => 'عدد مُخفَّض من مشاكل التنسيق الميداني',
				'qa2r16' => 'وثائق إنشاء أكثر دقة',
				'qa2r17' => 'صيانة عمليات مُحسَّنَة وإدارة مرافق مُحسَّنَة',
				'qa2r18' => 'مقدرة مُحسَّنَة على إنشاء تصنيع رقمي (التصنيع الرقمي هو تكنولوجيا تقوم تلقائياً بإنتاج مواد إنشاء أو مكونات،مثل هياكل الصلب، والقنوات أو المجاري، والألواح الخارجية، والحوائط الجاهزة، وذلك بواسطة وضع النموذج الرقمي بداخل نموذج الحاسب الآلي)',
				'qa3' => '3. ما مدى الأهمية التي ترى بأن نمذجة معلومات المبنى BIM ستكون عليها بالنسبة للصناعة في فترة الخمس سنوات القادمة؟',
				'qa3a' => 'أ‌.	لا أهمية',
				'qa3b' => 'ب‌.	أهمية منخفضة ',
				'qa3c' => 'ت‌.	أهمية متوسطة',
				'qa3d' => 'ث‌.	أهمية كبيرة',
				'qa3e' => 'ج‌.	أهمية كبيرة جداً',
				'partb' => 'الجزء ]ب[ أسئلة لمستخدمي نمذجة معلومات المبنى BIM',
				'qb1' => '1. ما هي النسبة  المئوية من مشاريع شركتك التي تستخدم نمذجة معلومات المبنى BIM؟',
				'qb2' => '2. أيا من الاختيارات التالية يصف بشكل أفضل مستوى خبرة شركتك بنمذجة معلومات المبنى BIM؟',
				'qb2a' => 'أ‌.	مبتدئ ',
				'qb2b' => 'ب‌.	متوسط',
				'qb2c' => 'ت‌.	متقدم',
				'qb2d' => 'ث‌.	خبير',
				'qb3' => '3. القائمة أدناه تعرض خدمات نمذجة معلومات المبنى BIM الرئيسية. برجاء الإشارة إلى جميع خدمات نمذجة معلومات المبنى BIM التي تعتقد بأنها مستخدمة في شركتك.',
				'qb3th1' => 'خدمات نمذجة معلومات المبنى BIM',
				'qb3th2' => 'قيد الاستخدام حاليا',
				'qb3th3' => 'رأيك',
				'qb3r1' => 'نمذجة الظروف القائمة',
				'qb3r2' => 'تقدير التكلفة/الكمية',
				'qb3r3' => 'تخطيط المرحلة (الجدولة)',
				'qb3r4' => 'التخطيط المكاني',
				'qb3r5' => 'تحليل الموقع',
				'qb3r6' => 'تأليف/نمذجة التصميم',
				'qb3r7' => 'تحليل هيكلي',
				'qb3r8' => 'تحليل الطاقة (طاقة ميكانيكية، طاقة الإضاءة، الخ)',
				'qb3r9' => 'تنسيق ثلاثي الأبعاد',
				'qb3r10' => 'تحكم وتخطيط ثلاثي الأبعاد',
				'qb3r11' => 'نمذجة السجل',
				'qb3r12' => 'جدولة الصيانة',
				'qb3r13' => 'تحليل نظام المبنى'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "spanish"){
			$data = array(
		
				'language' => $language,
				
				'h1' => 'Encuesta 2015 de adopción e implementación de BIM',
				
				'employee'=>'',
			
				'q1' => '1. Aproximadamente, ¿cuántos empleados trabajan para su empresa?  ',
				'q2' => '2. En su opinión, ¿qué porcentaje de proyectos actualmente están utilizando BIM en  su país? (donde esté trabajando actualmente si está trabajando en el extranjero) ',
				'q3' => '3. ¿En qué fase cree que BIM está en su país (donde esté trabajando actualmente si está trabajando en el extranjero) en términos de madurez de la tecnología?',
				'q3a' => 'a.	Activación de tecnología: El período durante el cual una tecnología atrae el interés de los medios de comunicación y la industria. Podrían aun no existir productos utilizables.',
				'q3b' => 'b.	Pico de expectativas infladas: El período durante el cual las expectativas relacionadas con la tecnología alcanzan un pico debido a una anticipación optimista.',
				'q3c' => 'c.	Comedero de desilusión: El período durante el cual se reconocen las limitaciones de la tecnología.',
				'q3d' => 'd.	Incremento de la ilustración: El período durante el cual se hace una inversión práctica en la tecnología a pesar de las respuestas pesimistas de los medios de comunicación y la industria. ',
				'q3e' => 'e.	Meseta de productividad: El período durante el cual la tecnología madura y está funcionando de forma estable en los mercados correspondientes.',

				'q4' => '4. ¿Cuál es el principal tipo de usuario que ha iniciado recientemente el uso de BIM en su país? (donde esté trabajando actualmente si está trabajando en el extranjero)',
				'q4a' => 'a.	Innovadores: Los primeros usuarios que adoptan una tecnología antes de que sea conocida.',
				'q4b' => 'b.	Los primeros en adoptar: Los usuarios que adoptan una tecnología cuando se conoce.',
				'q4c' => 'c.	Mayoría temprana: Los usuarios que adoptan una tecnología antes que el miembro medio de la sociedad.',
				'q4d' => 'd.	Mayoría tardía: Los usuarios que adoptan una tecnología después que el miembro medio de la sociedad.',
				'q4e' => 'e.	Rezagados: Los usuarios que adoptan una tecnología en las últimas etapas de su existencia.',

				'q5' => '5. ¿Cómo evaluaría el estado de adopción de BIM en su país (donde esté trabajando actualmente si está trabajando en el extranjero) en cada fase de los siguientes ciclos de vida de creación? ',
				'q5th1' => 'Ciclo de vida',
				'q5th2' => 'Tasa de adopción percibida (%)',
				'q5th3' => 'Madurez de la tec. (1-5)(ref. pregunta 4)',
				'q5th4' => 'Tipo de usuarios recientes(1-5)(ref. pregunta 5)',
				'q5th5' => 'Opinión',

				'q5r1' => 'Plan',
				'q5r2' => 'Diseño esquemático (SD)',
				'q5r3' => 'Desarrollo del diseño (DD)',
				'q5r4' => 'Diseño de construcción (CD)',
				'q5r5' => 'Construcción',
				'q5r6' => 'Operaciones y mantenimiento',




				'o1a' => 'Activación de tecnología',
				'o1b' => 'Pico de expectativas infladas',
				'o1c' => 'Comedero de desilusión',
				'o1d' => 'Incremento de la ilustración',
				'o1e' => 'Meseta de productividad',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovadores',
				'o2b' => 'Los primeros en adoptar',
				'o2c' => 'Mayoría temprana',
				'o2d' => 'Mayoría tardía',
				'o2e' => 'Rezagados',
				'o2x' => 'Select',


				
				'q6' => '6. La siguiente es una lista de los obstáculos para la adopción de BIM. Por favor, evalúe el impacto de cada artículo del 1 al 5, donde 1 es el impacto más bajo y 5 es el más alto.',
				'q6th1' => 'Obstáculo',
				'q6th2' => 'Impacto(1-5)',
				'q6th3' => 'Opinión',
				'q6r1' => 'Cuota baja de diseño',
				'q6r2' => 'Altos niveles de competencia debidos a un mercado de la construcción congelado',
				'q6r3' => 'Mercado liderado por contratistas',
				'q6r4' => 'Cambios de diseño excesivamente frecuentes',
				'q6r5' => 'Decisiones tardías tras exigentes fechas de entrega',
				'q6r6' => 'Documentos de construcción de baja calidad',
				'q6r7' => 'Dificultades de comunicación debidas a una estructura social jerárquica restringida',
				'q6r8' => 'Demandas excesivas de los clientes ',
				'q6r9' => 'Insuficiente apoyo de la sede',
				'q6r10' => 'La ignorancia de, o resistencia a una nueva tecnología',
				'q6r11' => 'Bajo presupuesto y corta duración del proyecto debido a la adquisición de malos proyectos',
				'q6r12' => 'Incentivos insuficientes para el diseño basado en BIM',
				'q6r13' => 'Falta de subcontratistas con capacidades BIM',
				'q6r14' => 'Falta de empleados con capacidades BIM',
				'q6r15' => 'Insuficiente contenido compatible con BIM disponible para mis necesidades',
				'q6r16' => 'Otros (por favor, explique):',



				'q7' => '7. 7. ¿Utiliza BIM?',
				'yes' => 'Sí',
				'no' => 'No',
				'q7a' => 'he estado usando BIM durante',
				'q7b' => 'año(s).',

				'parta' => 'Parte [A] Preguntas para no usuarios de BIM',
				'qa1' => '1. Por favor, evalúe la importancia de cada una de las siguientes razones para no adoptar BIM en su empresa utilizando una escala de 1 a 5, donde 1 es ningún impacto en su decisión de no utilizar BIM y 5 el mayor impacto en su decisión de no utilizar BIM:',
				'qa1th1' => 'Razones para no adoptar BIM',
				'qa1th2' => 'Impacto(1-5)',
				'qa1th3' => 'Opinión',
				'qa1r1' => 'La funcionalidad no se aplica bien a lo que hacemos.',
				'qa1r2' => 'No hemos tenido tiempo suficiente para evaluarlo.',
				'qa1r3' => 'Creemos que los métodos actuales que utilizamos son mejores.',
				'qa1r4' => 'No hay suficiente demanda de los clientes y/u otras empresas para utilizar BIM para los proyectos.',
				'qa1r5' => 'El software es demasiado caro.',
				'qa1r6' => 'Las actualizaciones de hardware requeridas son demasiado caras.',
				'qa1r7' => 'El software es demasiado difícil de usar.',
				'qa1r8' => 'Insuficiente formación disponible.',
				'qa1r9' => 'Insuficiente contenido compatible con BIM disponible para mis necesidades',
				'qa1r10' => 'BIM tiene escasa interoperabilidad con aplicaciones CAD.',
				'qa1r11' => 'Tenemos preocupaciones sobre el seguro y/o responsabilidad.',
				'qa2' => '2. Utilizando una escala del 1 al 5, por favor puntúe los siguientes elementos en términos de su impacto en la decisión de su organización para adoptar BIM en el futuro, siendo 1 que no influye en su decisión de adoptar BIM y 5 el mayor impacto en su decisión de adoptar BIM.',
				'qa2th1' => 'Beneficios esperados de la adopción de BIM',
				'qa2th2' => 'Impacto(1-5)',
				'qa2th3' => 'Opinión',
				'qa2r1' => 'Habilidad mejorada para hacer un diseño y construcción sostenibles',
				'qa2r2' => 'La mejora de las capacidades de programación',
				'qa2r3' => 'La mejora de la presupuestación y la capacidad de estimación de costes',
				'qa2r4' => 'Mejor capacidad para utilizar técnicas de construcción austeras (técnicas de construcción austeras siguiendo los principios establecidos por el Lean Construction Institute para minimizar el desperdicio y optimizar la planificación)',
				'qa2r5' => 'Mejora de la comunicación entre todas las partes en los procesos de diseño y construcción',
				'qa2r6' => 'Menos tiempo haciendo borradores, más tiempo diseñando',
				'qa2r7' => 'Mejora de la comprobación de código y/o cumplimiento',
				'qa2r8' => 'Modificación de los parámetros de diseño',
				'qa2r9' => 'Reducción de los costes de construcción',
				'qa2r10' => 'Horario reducido de construcción',
				'qa2r11' => 'Reducción de las demandas judiciales y/o seguros',
				'qa2r12' => 'Lugares de trabajo más seguros',
				'qa2r13' => 'Demanda del propietario de BIM en sus proyectos',
				'qa2r14' => 'Necesidad reducida para, y el número de, solicitudes de información ',
				'qa2r15' => 'Reducción del número de problemas de coordinación sobre el terreno',
				'qa2r16' => 'Documentos de construcción más precisos',
				'qa2r17' => 'Mejora de las operaciones de mantenimiento y gestión de instalaciones',
				'qa2r18' => 'Capacidad mejorada para crear fabricación digital (la fabricación digital es una tecnología que produce automáticamente materiales o componentes de construcción, como marcos de acero, conductos, paneles exteriores y particiones, introduciendo el modelo digital en el modelo del ordenador)',
				'qa3' => '3. ¿Cuál cree usted que será la importancia de BIM para la industria en cinco años?',
				'qa3a' => 'a.	Sin importancia ',
				'qa3b' => 'b.	Importancia baja  ',
				'qa3c' => 'c.	Importancia moderada ',
				'qa3d' => 'd.	Importancia alta ',
				'qa3e' => 'e.	Importancia muy alta',
				'partb' => 'Parte [B] Preguntas para los usuarios de BIM',
				'qb1' => '1. ¿Qué porcentaje de los proyectos de su empresa utilizan BIM? ',
				'qb2' => '2. ¿Cuál describe mejor el nivel de experiencia BIM de su empresa?',
				'qb2a' => 'a.	Principiante ',
				'qb2b' => 'b.	Moderado',
				'qb2c' => 'c.	Avanzado',
				'qb2d' => 'd.	Experto',
				'qb3' => '3. La siguiente lista muestra los principales servicios de BIM. Indique todos los servicios BIM que usted piensa que se utilizan en su empresa.',
				'qb3th1' => 'Servicios BIM',
				'qb3th2' => 'Siendo utilizados',
				'qb3th3' => 'Opinión',
				'qb3r1' => 'Modelado de condiciones existentes',
				'qb3r2' => 'Estimación de costes/cantidades',
				'qb3r3' => 'Planificación de fases (programación)',
				'qb3r4' => 'Ordenación territorial',
				'qb3r5' => 'Análisis de las instalaciones',
				'qb3r6' => 'Modelado de diseño/autoría',
				'qb3r7' => 'Análisis estructural',
				'qb3r8' => 'Análisis de energía (mecánica, iluminación, etc.)',
				'qb3r9' => 'Coordinación 3D',
				'qb3r10' => 'Control 3D y planificación',
				'qb3r11' => 'Modelado de registros',
				'qb3r12' => 'Programación del mantenimiento',
				'qb3r13' => 'Análisis de sistemas de construcción'

				
			);
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else {

			Session::flash('message', "You have to select language.");
			return Redirect::back();
		}

		}else{

			Session::flash('message','It&#39;s wrong access.');
			return Redirect::to('slimbimsurvey/submitted');

		}

		
		



	}
	
	
	public function store()
	{


		$rules = array(

		

			'q3' => 'required|numeric',
			'q4' => 'required|numeric',
			'q5' => 'required|numeric',

			'q6_q11' => 'required|numeric',
			'q6_q21' => 'required|numeric',
			'q6_q31' => 'required|numeric',
			'q6_q41' => 'required|numeric',
			'q6_q51' => 'required|numeric',
			'q6_q61' => 'required|numeric',
			'q6_q12' => 'required|numeric',
			'q6_q22' => 'required|numeric',
			'q6_q32' => 'required|numeric',
			'q6_q42' => 'required|numeric',
			'q6_q52' => 'required|numeric',
			'q6_q62' => 'required|numeric',
			'q6_q13' => 'required|numeric',
			'q6_q23' => 'required|numeric',
			'q6_q33' => 'required|numeric',
			'q6_q43' => 'required|numeric',
			'q6_q53' => 'required|numeric',
			'q6_q63' => 'required|numeric',

			'q7_q11' => 'required|numeric',
			'q7_q21' => 'required|numeric',
			'q7_q31' => 'required|numeric',
			'q7_q41' => 'required|numeric',
			'q7_q51' => 'required|numeric',
			'q7_q61' => 'required|numeric',
			'q7_q71' => 'required|numeric',
			'q7_q81' => 'required|numeric',
			'q7_q91' => 'required|numeric',
			'q7_q101' => 'required|numeric',
			'q7_q111' => 'required|numeric',
			'q7_q121' => 'required|numeric',
			'q7_q131' => 'required|numeric',
			'q7_q141' => 'required|numeric',
			'q7_q151' => 'required|numeric',
			'q7_q161' => 'required|numeric'


		
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails())
		{

			$language = Input::get('language');


			if($language == "english")
			{

			$data = array(
		
				'language' => $language,
				
				'h1' => '2015 BIM Adoption and Implementation Survey',
				
				'employee'=>'Employees',

			
				'q1' => '1. Approximately how many employees are currently working for your company? ',
				'q2' => '2. In your opinion, what percentage of projects are currently using BIM in your country (where you are currently working if you are working abroad)?',
				'q3' => '3. In which phase do you think BIM is in your country (where you are currently working if you are working abroad) in terms of technology maturity?',
				'q3a' => 'a. Technology Trigger: The period during which a technology attracts interest from the media and industry. Usable products may not yet exist.',
				'q3b' => 'b. Peak of Inflated Expectations: The period during which the expectations related to the technology are at their peak due to optimistic anticipation.',
				'q3c' => 'c. Trough of Disillusionment: The period during which the limitations of the technology are acknowledged.',
				'q3d' => 'd. Slope of Enlightenment: The period during which practical investment is made in the technology despite pessimistic responses from the media and industry.',
				'q3e' => 'e. Plateau of Productivity: The period during which the technology matures and is operating stably in the appropriate markets.',

				'q4' => '4. What is the main type of user who has recently started using BIM in your country (where you are currently working if you are working abroad)?',
				'q4a' => 'a. Innovators: The very first users who adopt a technology before it is known.',
				'q4b' => 'b. Early adopters: The users who adopt a technology when it is known.',
				'q4c' => 'c. Early majority: The users who adopt a technology before the average member of society.',
				'q4d' => 'd. Late majority: The users who adopt a technology after the average member of society.',
				'q4e' => 'e. Laggards: The users who adopt a technology in the late stages of its existence.',

				'q5' => '5. How would you evaluate the BIM adoption status in your country (where you are currently working if you are working abroad) at each phase of the following construction lifecycles: ',
				'q5th1' => 'Lifecycle',
				'q5th2' => 'Perceived adoption rate (%)',
				'q5th3' => 'Tech. maturity (1-5)(ref. Question 4)',
				'q5th4' => 'Type of recent users(1-5)(ref. Question 5)',
				'q5th5' => 'Opinion',

				'q5r1' => 'Plan',
				'q5r2' => 'Schematic design (SD)',
				'q5r3' => 'Design development (DD)',
				'q5r4' => 'Construction design (CD)',
				'q5r5' => 'Construction',
				'q5r6' => 'Operation and maintenance',




				'o1a' => 'Technology Trigger',
				'o1b' => 'Peak of Inflated Expectations',
				'o1c' => 'Trough of Disillusionment',
				'o1d' => 'Slope of Enlightenment',
				'o1e' => 'Plateau of Productivity',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovators',
				'o2b' => 'Early adopters',
				'o2c' => 'Early majority',
				'o2d' => 'Late majority',
				'o2e' => 'Laggards',
				'o2x' => 'Select',


				
				'q6' => '6. The following is a list of the obstacles to BIM adoption. Please evaluate the impact of each item from 1 to 5 where 1 is the lowest impact and 5 is the highest impact.',
				'q6th1' => 'Obstacle',
				'q6th2' => 'Impact(1-5)',
				'q6th3' => 'Opinion',
				'q6r1' => 'Low design fee',
				'q6r2' => 'High levels of competition due to a frozen construction market',
				'q6r3' => 'Market led by contractors',
				'q6r4' => 'Overly frequent design changes',
				'q6r5' => 'Late decisions after hard deadlines',
				'q6r6' => 'Low-quality construction documents',
				'q6r7' => 'Communication difficulties due to a restricted hierarchical social structure',
				'q6r8' => 'Excessive client demands ',
				'q6r9' => 'Insufficient support from headquarters',
				'q6r10' => 'Ignorance of, or resistance to, a new technology',
				'q6r11' => 'Low budget and short project duration due to the acquisition of bad projects',
				'q6r12' => 'Insufficient incentives for BIM-based design',
				'q6r13' => 'Lack of subcontractors with BIM capabilities',
				'q6r14' => 'Lack of employees with BIM capabilities',
				'q6r15' => 'Insufficient BIM-compatible content available for my needs',
				'q6r16' => 'Other (please explain)',



				'q7' => '7. Do you use BIM?',
				'yes' => 'Yes',
				'no' => 'No',
				'q7a' => 'I have been using BIM for',
				'q7b' => 'year(s).',

				'parta' => 'Part [A] Questions for non-BIM users',
				'qa1' => '1. Please rate the importance of each of the following reasons for not adopting BIM in your company using a scale of 1 to 5, with 1 being no impact on your decision to not use BIM and 5 being the greatest impact on your decision to not use BIM:',
				'qa1th1' => 'Reasons for not adopting BIM',
				'qa1th2' => 'Impact(1-5)',
				'qa1th3' => 'Opinion',
				'qa1r1' => 'The functionality doesn&#39;t apply well enough to what we do.',
				'qa1r2' => 'We haven&#39;t had sufficient time to evaluate it.',
				'qa1r3' => 'We believe the current methods we use are better.',
				'qa1r4' => 'There is not enough demand from clients and/or other firms to use BIM for the projects.',
				'qa1r5' => 'The software is too expensive.',
				'qa1r6' => 'The required hardware upgrades are too expensive.',
				'qa1r7' => 'The software is too difficult to use.',
				'qa1r8' => 'Insufficient training is available.',
				'qa1r9' => 'Insufficient BIM-compatible content is available for my needs.',
				'qa1r10' => 'BIM has poor interoperability with CAD applications.',
				'qa1r11' => 'We have concerns about insurance and/or liability.',
				'qa2' => '2. Using a scale of 1 to 5, please rate the following items in terms of their impact on your organization&#39;s decision to adopt BIM in the future, with 1 being no impact on your decision to adopt BIM and 5 being the greatest impact on your decision to adopt BIM.',
				'qa2th1' => 'Expected benefits of BIM adoption',
				'qa2th2' => 'Impact(1-5)',
				'qa2th3' => 'Opinion',
				'qa2r1' => 'Improved ability to do sustainable design and construction',
				'qa2r2' => 'Improved scheduling capabilities',
				'qa2r3' => 'Improved budgeting and cost estimating capabilities.',
				'qa2r4' => 'Increased ability to use lean construction techniques (lean construction techniques following the principles set forth by the Lean Construction Institute to minimize waste and optimize planning)',
				'qa2r5' => 'Improved communication between all parties in the design and construction processes',
				'qa2r6' => 'Less time drafting, more time designing',
				'qa2r7' => 'Improved code checking and/or compliance',
				'qa2r8' => 'Modification of the design parameters',
				'qa2r9' => 'Reduced construction costs',
				'qa2r10' => 'Reduced construction schedule',
				'qa2r11' => 'Reducing litigation and/or insurance claims',
				'qa2r12' => 'Safer worksites',
				'qa2r13' => 'Owner demand for BIM on their projects',
				'qa2r14' => 'Reduced necessity for, and number of, information requests',
				'qa2r15' => 'Reduced number of field coordination problems',
				'qa2r16' => 'More accurate construction documents',
				'qa2r17' => 'Improved operations maintenance and facility management',
				'qa2r18' => 'Improved ability to create digital fabrication(Digital fabrication is a technology that automatically produces construction materials or components, such as steel frames, ducts, exterior panels, and partitions, by inputting the digital model into the computer model)',
				'qa3' => 'How important do you believe BIM will be to the industry in five years time?',
				'qa3a' => 'a. No importance',
				'qa3b' => 'b. Low importance',
				'qa3c' => 'c. Moderate importance',
				'qa3d' => 'd. High importance',
				'qa3e' => 'e. Very high importance',
				'partb' => 'Part [B] Questions for BIM users',
				'qb1' => '1. What percentage of your company&#39;s projects use BIM?',
				'qb2' => 'Which best describes your company&#39;s level of BIM expertise?',
				'qb2a' => 'a. Beginner',
				'qb2b' => 'b. Moderate',
				'qb2c' => 'c. Advanced',
				'qb2d' => 'd. Expert',
				'qb3' => 'The list below shows the major BIM services. Please indicate all the BIM services that you think are used in your company.',
				'qb3th1' => 'BIM services',
				'qb3th2' => 'Being used',
				'qb3th3' => 'Opinion',
				'qb3r1' => 'Existing Conditions Modeling',
				'qb3r2' => 'Cost/Quantity Estimation',
				'qb3r3' => 'Phase Planning (Scheduling)',
				'qb3r4' => 'Spatial Planning',
				'qb3r5' => 'Site Analysis',
				'qb3r6' => 'Design Modeling/Authoring',
				'qb3r7' => 'Structural Analysis',
				'qb3r8' => 'Energy Analysis (Mechanical, Lighting, and so on)',
				'qb3r9' => '3D Coordination',
				'qb3r10' => '3D Control and Planning',
				'qb3r11' => 'Record Modeling',
				'qb3r12' => 'Maintenance Scheduling',
				'qb3r13' => 'Building System Analysis'

				
			);
			
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);

			}else if($language == "french"){
			$data = array(
		
				'language' => $language,
				
				'h1' => 'Enquête sur l’adoption et la mise en œuvre du BIM 2015',
				
				'employee'=>'',
			
				'q1' => '1.	Combien d&#39;employés compte environ votre entreprise ?',
				'q2' => '2.	À votre avis, quel est le pourcentage de projets qui utilisent actuellement le BIM dans votre pays (ou dans le pays où vous travaillez) ? ',
				'q3' => '3.	D’après vous, à quelle étape le BIM se trouve-t-il en ce moment dans votre pays (ou dans le pays où vous travaillez) du point de vue de la maturité technologique ?',
				'q3a' => 'a.	Lancement de la technologie : Phase pendant laquelle une technologie suscite l&#39;intérêt des médias et du secteur. Il se peut qu&#39;aucun produit utilisable ne soit encore disponible.',
				'q3b' => 'b.	Pic d&#39;expectative : Phase pendant laquelle les attentes liées à la technologie sont à leur apogée, poussées par une vague d&#39;optimisme en anticipation.',
				'q3c' => 'c.	Creux de la désillusion : Phase pendant laquelle on prend conscience des limites de la technologie.',
				'q3d' => 'd.	Pente d&#39;illumination : Phase pendant laquelle des investissements concrets sont effectués malgré des réactions pessimistes de la part des médias et du secteur.',
				'q3e' => 'e.	Pallier de productivité : Phase pendant laquelle la technologie murit et est employée de manière stable sur les marchés appropriés. ',

				'q4' => '4.	Quel est le principal type d&#39;utilisateur qui a récemment commencé à utiliser le BIM dans votre pays (ou dans le pays où vous travaillez) ?',
				'q4a' => 'a.	Innovateurs : Les premiers utilisateurs qui adoptent une technologie avant qu&#39;elle ne soit connue.',
				'q4b' => 'b.	Adopteurs précoces : Les utilisateurs qui adoptent une technologie lorsqu&#39;elle devient connue.',
				'q4c' => 'c.	Majorité précoce : Les utilisateurs qui adoptent une technologie avant le citoyen moyen.',
				'q4d' => 'd.	La majorité tardive : Les utilisateurs qui adoptent une technologie après le citoyen moyen.',
				'q4e' => 'e.	Retardataires : Les utilisateurs qui adoptent une technologie à la fin des étapes de son existence.',

				'q5' => '5.	Comment évaluez-vous l&#39;état de l&#39;adoption de BIM dans votre pays (ou dans le pays où vous travaillez) lors de chacune de ces phases du cycle de construction :',
				'q5th1' => 'Cycle de vie',
				'q5th2' => 'Taux d&#39;adoption perçu (%)',
				'q5th3' => 'Maturité technologique (1-5)(cf. question 3)',
				'q5th4' => 'Type d&#39;utilisateurs récents(1-5)(cf. question 4)',
				'q5th5' => 'Opinion',

				'q5r1' => 'Plan',
				'q5r2' => 'Conception des plans (SD)',
				'q5r3' => 'Élaboration du design (DD)',
				'q5r4' => 'Conception de la construction (CD)',
				'q5r5' => 'Construction',
				'q5r6' => 'Exploitation et maintenance',




				'o1a' => 'Lancement de la technologie',
				'o1b' => 'Pic d&#39;expectative',
				'o1c' => 'Creux de la désillusion',
				'o1d' => 'Pente d&#39;illumination',
				'o1e' => 'Pallier de productivité',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovateurs',
				'o2b' => 'Adopteurs précoces',
				'o2c' => 'Majorité précoce',
				'o2d' => 'La majorité tardive',
				'o2e' => 'Retardataires',
				'o2x' => 'Select',


				
				'q6' => '6.	Ce qui suit est une liste d&#39;obstacles éventuels à l&#39;adoption du BIM. Veuillez évaluer l&#39;impact de chaque article de “1” à “5”, où “1” a l&#39;impacte le plus faible et “5” a l&#39;impact le plus fort.',
				'q6th1' => 'Obstacle',
				'q6th2' => 'Impact(1-5)',
				'q6th3' => 'Opinion',
				'q6r1' => 'Baisse des frais de conception',
				'q6r2' => 'Haut niveau de concurrence à cause d&#39;un marché de la construction en stagnation',
				'q6r3' => 'Marché dirigé par des sous-traitants',
				'q6r4' => 'Trop grande fréquence des modifications de la conception',
				'q6r5' => 'Tardiveté des décisions après des délais serrés',
				'q6r6' => 'Mauvaise qualité des documents de construction',
				'q6r7' => 'Difficultés de communication dues à une structure hiérarchique trop restreinte',
				'q6r8' => 'Exigences excessives de la part des clients ',
				'q6r9' => 'Insuffisance du soutien fourni par le siège',
				'q6r10' => 'Ignorance de ou résistance à la nouvelle technologie',
				'q6r11' => 'Étroitesse des budgets et des délais à cause de l&#39;acquisition de mauvais projets',
				'q6r12' => 'Insuffisance des motivations pour passer à la conception BIM',
				'q6r13' => 'Manque de sous-traitants sachant employer le BIM',
				'q6r14' => 'Manque d&#39;employés sachant employer le BIM',
				'q6r15' => 'Insuffisance de la disponibilité du contenu compatible avec le BIM par rapport à mes besoins.',
				'q6r16' => 'Autres (veuillez expliquer)',



				'q7' => '7.	Utilisez-vous le BIM ?',
				'yes' => 'Oui, j&#39;',
				'no' => 'Non.',
				'q7a' => 'utilise le BIM depuis ',
				'q7b' => 'an(s).',

				'parta' => 'Partie [A] : Questions pour les non-utilisateurs du BIM',
				'qa1' => '1.	Parmi les éventuelles causes suivantes, veuillez évaluer l&#39;importance de chacune d&#39;entre elles dans votre décision de ne pas adopter le BIM dans votre entreprise, en utilisant une échelle de 1 à 5, « 1 » signifiant « Aucune influence sur notre décision de ne pas adopter le BIM », et « 5 » signifiant « Facteur déterminant notre décision de ne pas adopter le BIM » :',
				'qa1th1' => 'Raisons de la non-adoption du BIM',
				'qa1th2' => 'Impact(1-5)',
				'qa1th3' => 'Opinion',
				'qa1r1' => 'Ses fonctionnalités ne correspondent pas assez à ce que nous faisons.',
				'qa1r2' => 'Nous n&#39;avons pas encore eu le temps de l&#39;évaluer.',
				'qa1r3' => 'Nous pensons que les méthodes que nous utilisons actuellement sont meilleures.',
				'qa1r4' => 'Il n&#39;y a pas assez de demandes de la part de clients et/ou d&#39;autres entreprises pour l&#39;utilisation du BIM dans nos projets.',
				'qa1r5' => 'Le logiciel coute trop cher.',
				'qa1r6' => 'Les mises à niveau du matériel informatique nécessaires coutent trop chères.',
				'qa1r7' => 'Le logiciel est trop difficile à utiliser.',
				'qa1r8' => 'Il n&#39;y pas assez de formations disponibles.',
				'qa1r9' => 'Trop peu de contenu compatible avec mes besoins est disponible.',
				'qa1r10' => 'BIM fonctionne mal avec les applications de CAO.',
				'qa1r11' => 'Nous avons des soucis au niveau de l&#39;assurance et/ou de la responsabilité.',
				'qa2' => '2.	Veuillez évaluer les points suivants en fonction de leur influence potentielle sur une éventuelle décision de votre organisation à adopter le BIM à l&#39;avenir, en utilisant une échelle de 1 à 5, « 1 » signifiant « Aucun impact sur une éventuelle décision d&#39;adopter le BIM » et « 5 » signifiant « Influence décisive sur une éventuelle décision d&#39;adopter le BIM ».',
				'qa2th1' => 'Avantages potentiels de l&#39;adoption du BIM',
				'qa2th2' => 'Impact(1-5)',
				'qa2th3' => 'Opinion',
				'qa2r1' => 'Amélioration des capacités à faire des conceptions et constructions durables',
				'qa2r2' => 'Amélioration des capacités de planification',
				'qa2r3' => 'Amélioration de la budgétisation et des capacités d&#39;estimation des couts',
				'qa2r4' => 'Amélioration des capacités d&#39;utilisation de techniques de construction allégée (techniques de construction allégée selon les principes énoncés par l&#39;Institut pour la construction allégée afin de réduire les déchets et d&#39;optimiser la planification)',
				'qa2r5' => 'Amélioration de la communication entre toutes les parties dans les processus de conception et de construction',
				'qa2r6' => 'Moins de temps passé sur les brouillons, plus de temps pour la conception',
				'qa2r7' => 'Amélioration de la vérification de code et/ou de la conformité',
				'qa2r8' => 'Modification des paramètres de conception',
				'qa2r9' => 'Réduction des couts de construction',
				'qa2r10' => 'Réduction de la planification de construction',
				'qa2r11' => 'Réduction des litiges et/ou des règlements d&#39;assurance',
				'qa2r12' => 'Meilleure sécurité sur le chantier',
				'qa2r13' => 'Certains propriétaires exigent l&#39;adoption du BIM pour leurs projets',
				'qa2r14' => 'Réduction des besoins en et du nombre de demandes d&#39;information ',
				'qa2r15' => 'Réduction du nombre de problèmes de coordination sur le terrain',
				'qa2r16' => 'Documents de construction plus précis',
				'qa2r17' => 'Amélioration de l&#39;entretien des opérations et de la gestion des installations',
				'qa2r18' => 'Amélioration de la capacité de fabrication numérique (la fabrication numérique est une technologie qui produit automatiquement des matériaux ou composants de construction, tels que des cadres en acier, conduits, panneaux extérieurs et cloisons par saisie du modèle numérique dans l&#39;ordinateur)',
				'qa3' => '3.	À votre avis, quelle sera l&#39;importance du BIM dans le secteur d&#39;ici cinq ans ?',
				'qa3a' => 'a.	Sans importance',
				'qa3b' => 'b.	Faible importance  ',
				'qa3c' => 'c.	Importance moyenne',
				'qa3d' => 'd.	Grande importance ',
				'qa3e' => 'e.	Très grande importance',
				'partb' => 'Partie [B] : Questions pour les utilisateurs du BIM',
				'qb1' => '1.	Quel est la part de projets réalisés par votre entreprise en utilisant le BIM ? ',
				'qb2' => '2.	Quel est le terme décrivant le mieux le niveau d&#39;expertise BIM de votre entreprise ?',
				'qb2a' => 'a.	Débutant ',
				'qb2b' => 'b.	Moyen ',
				'qb2c' => 'c.	Avancé',
				'qb2d' => 'd.	Expert ',
				'qb3' => '3.	La liste ci-dessous indique les principaux services BIM. Veuillez indiquer tous les services BIM qui sont selon vous utilisés dans votre entreprise.',
				'qb3th1' => 'Services BIM',
				'qb3th2' => 'Utilisé ?',
				'qb3th3' => 'Opinion',
				'qb3r1' => 'Modélisation des conditions existantes',
				'qb3r2' => 'Évaluation des couts et quantités',
				'qb3r3' => 'Phase de planification (programmation)',
				'qb3r4' => 'Planification spatiale',
				'qb3r5' => 'Analyse de site',
				'qb3r6' => 'Modélisation/création du design',
				'qb3r7' => 'Analyse structurelle',
				'qb3r8' => 'Analyse énergétique (mécanique, éclairage et ainsi de suite)',
				'qb3r9' => 'Coordination 3D',
				'qb3r10' => 'Contrôle et planification 3D',
				'qb3r11' => 'Modélisation des enregistrements',
				'qb3r12' => 'Planification de l&#39;entretien',
				'qb3r13' => 'Analyse des systèmes de construction'

				
			);
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "chinese"){
			$data = array(
		
				'language' => $language,
				
				'h1' => '2015年BIM採用及實施情況的調查',
				
				'employee'=>'名',
			
				'q1' => '1. 目前貴公司約有多少名員工？',
				'q2' => '2. 您認為在您的國家（若您在海外工作，您目前身處的國家）有百分之多少的項目正在使用 BIM？',
				'q3' => '3. 就技術成熟度而言，您認為 BIM 在您的國家（若您在海外工作，您目前身處的國家）內處於哪一個階段？',
				'q3a' => 'a.	技術萌芽期：這段時期有一種技術令傳媒和業界產生興趣，未必已有可使用的產品存在。',
				'q3b' => 'b.	期望膨脹頂峰：這段時期內由於樂觀的預測，對有關技術的期望處於最高水平。',
				'q3c' => 'c.	泡沫化的谷底期：這段時期內該技術的限制是眾所公認的。',
				'q3d' => 'd.	穩步爬升的光明期：這段時期內儘管傳媒和業界作出悲觀的反應，有人對技術作出實際的投資。 ',
				'q3e' => 'e.	生產平穩期：這段時期內技術已成熟，並在合適的市場穩定地運作。',

				'q4' => '4. 在您的國家（若您在海外工作，您目前身處的國家）內，最近開始使用 BIM 的主要使用者是屬於哪一類使用者？',
				'q4a' => 'a.	創新者：在新技術為人所知之前率先採用它的第一批人',
				'q4b' => 'b.	早期採用者：在新技術為人所知之時採用它的使用者',
				'q4c' => 'c.	早期採用群體：比社會上一般人更早採用新技術的使用者',
				'q4d' => 'd.	後期採用群體：比社會上一般人更遲採用新技術的使用者',
				'q4e' => 'e.	落後者：在技術存在已久時採用它的使用者',

				'q5' => '5. 對於在您的國家（若您在海外工作，您目前身處的國家）內，BIM 在建築生命周期的下列每個階段的採用情況，您有怎樣的評價？ ',
				'q5th1' => '生命周期',
				'q5th2' => '感知採用率 (%)',
				'q5th3' => '技術成熟度 (1–5)(參考第4條問題)',
				'q5th4' => '最近使用者的類型(1–5)(參考第5條問題)',
				'q5th5' => '意見',

				'q5r1' => '規劃',
				'q5r2' => '大網設計 (SD)',
				'q5r3' => '設計發展 (DD)',
				'q5r4' => '建築設計 (CD)',
				'q5r5' => '建築',
				'q5r6' => '營運和維修',




				'o1a' => '技術萌芽期',
				'o1b' => '期望膨脹頂峰',
				'o1c' => '泡沫化的谷底期',
				'o1d' => '穩步爬升的光明期',
				'o1e' => '生產平穩期',
				'o1x' => '選擇',
				'select' => '選擇',

				'o2a' => '創新者',
				'o2b' => '生產平穩期',
				'o2c' => '早期採用群體',
				'o2d' => '後期採用群體',
				'o2e' => '落後者',
				'o2x' => '選擇',


				
				'q6' => '6. 下列是採用 BIM 的障礙。請以 1 至 5 的等級來評估每個障礙的影響力；1 代表最低度的影響，5 是最高度。',
				'q6th1' => '障礙',
				'q6th2' => '影響(1–5)',
				'q6th3' => '意見',
				'q6r1' => '偏低的設計收費',
				'q6r2' => '由於建築市場處於凍結狀態而產生的高度競爭',
				'q6r3' => '由承建商領導的市場',
				'q6r4' => '過度頻繁的設計變動',
				'q6r5' => '硬性限期過後的遲來決定',
				'q6r6' => '低質量的建築文件',
				'q6r7' => '限制性分層社會結構所導致的溝通困難',
				'q6r8' => '過量的客戶要求 ',
				'q6r9' => '來自總部的支援不足',
				'q6r10' => '對新技術的無知或抗拒態度',
				'q6r11' => '由於獲得不良項目所致的低預算和項目完成的短期限',
				'q6r12' => '基於 BIM 的設計沒有足夠誘因支持',
				'q6r13' => '缺乏具使用 BIM 能力的次承建商',
				'q6r14' => '缺乏具使用 BIM 能力的員工',
				'q6r15' => '符合我需求而與 BIM 兼容的內容不足',
				'q6r16' => '其他（請解釋）',



				'q7' => '7. 您是否使用 BIM？',
				'yes' => '是',
				'no' => '否',
				'q7a' => '我使用 BIM 已有 ',
				'q7b' => '年。',

				'parta' => '[A] 不使用 BIM 者須回答的問題',
				'qa1' => '1. 對於貴公司不採用 BIM，請以 1 至 5 的等級為下列每一個原因評估其重要性；1 代表對您不使用 BIM 的決定沒有影響力，而 5 代表對您不使用 BIM 的決定有最大的影響力：',
				'qa1th1' => '不採用 BIM 的原因',
				'qa1th2' => '影響(1-5)',
				'qa1th3' => '意見',
				'qa1r1' => '功能不大適用於我們的業務。',
				'qa1r2' => '我們沒有足夠時間對它進行評估。',
				'qa1r3' => '我們相信目前所使用的方法較佳。',
				'qa1r4' => '客戶及／其他公司對於項目使用 BIM 的需求不足。',
				'qa1r5' => '軟件太昂貴。',
				'qa1r6' => '要進行的硬件升級太昂貴。',
				'qa1r7' => '該軟件太難使用。',
				'qa1r8' => '沒有足夠的培訓提供。',
				'qa1r9' => '符合我需求而與 BIM 兼容的內容不足。',
				'qa1r10' => 'BIM 與 CAD 應用程式的互用性很低。',
				'qa1r11' => '我們對保險及／或責任有疑慮。',
				'qa2' => '2. 對於貴機構將來採用 BIM 的決定，以 1 至 5 的等級為下列每項好處的影響力評分；1 代表對您採用 BIM 的決定沒有影響力，而 5 代表對您採用 BIM 的決定有最大的影響力。',
				'qa2th1' => '採用 BIM 的預期好處',
				'qa2th2' => '影響(1-5)',
				'qa2th3' => '意見',
				'qa2r1' => '提高進行可持續設計和建築的能力',
				'qa2r2' => '提高排程能力',
				'qa2r3' => '提高制訂預算和估計成本的能力',
				'qa2r4' => '更有能力使用精益建築技術 (精益建築技術遵照由Lean Construction Institute 所提出的原則，使廢料減至最少，並將規劃最優化。) ',
				'qa2r5' => '加強設計和建築過程中所有人之間的溝通',
				'qa2r6' => '減少起草時間，有更多的設計時間',
				'qa2r7' => '加強代碼查核及／或合規能力',
				'qa2r8' => '設計參數的修改',
				'qa2r9' => '建築成本減少',
				'qa2r10' => '施工所需時間縮短',
				'qa2r11' => '減少訴訟及／或保險索償',
				'qa2r12' => '更安全的工地',
				'qa2r13' => '委託人對其項目使用 BIM 的需求',
				'qa2r14' => '減少索取資料要求的必要性和數量 ',
				'qa2r15' => '減少實地協調問題的數量',
				'qa2r16' => '更準確的建築文件',
				'qa2r17' => '更佳的營運維修和設施管理',
				'qa2r18' => '提高製作數碼建模 (digital fabrication) 的能力（數碼建模是一種技術，透過向電腦模型輸入數碼模型，自動地產生例如鋼架、導管、外板和隔板等建築材料或元件。）',
				'qa3' => '3. 您相信 5 年後 BIM 對業界將有多重要？',
				'qa3a' => 'a.	不重要 ',
				'qa3b' => 'b.	低度重要  ',
				'qa3c' => 'c.	中度重要 ',
				'qa3d' => 'd.	高度重要',
				'qa3e' => 'e.	非常重要',
				'partb' => '[B] BIM 使用者須回答的問題',
				'qb1' => '1. 貴公司有多少百分比的項目是使用 BIM？ ',
				'qb2' => '2. 下列哪一項最適合形容貴公司對 BIM 的專門程度？',
				'qb2a' => 'a.	入門',
				'qb2b' => 'b.	中等',
				'qb2c' => 'c.	高級',
				'qb2d' => 'd.	專家',
				'qb3' => '3. 下列是主要的 BIM 服務。請指出您認為貴公司有使用的全部 BIM 服務。',
				'qb3th1' => 'BIM 服務',
				'qb3th2' => '正在使用',
				'qb3th3' => '意見',
				'qb3r1' => '現存狀況建模',
				'qb3r2' => '成本／數量估計',
				'qb3r3' => '分期規劃 (排程)',
				'qb3r4' => '空間規劃',
				'qb3r5' => '工地分析',
				'qb3r6' => '設計建模／創作',
				'qb3r7' => '結構分析',
				'qb3r8' => '能源分析 (機械、照明等等)',
				'qb3r9' => '3D 協調',
				'qb3r10' => '3D 控制與規劃',
				'qb3r11' => '記錄建模',
				'qb3r12' => '維修排程',
				'qb3r13' => '建築系統分析'

				
			);
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "korean"){
			$data = array(
		
				'language' => $language,
				
				'employee'=>'명',
				
				'h1' => '2015 건축사 BIM 도입현황 설문',
			
				'q1' => '1. 귀사의 전체 직원수가 대략 몇 명인가요?',
				'q2' => '2. 우리나라 전체적으로는 BIM을 전체 프로젝트의 대략 몇 퍼센트 정도 사용하고 있다고 느끼십니까?',
				'q3' => '3. 우리나라의 현재 BIM 기술 단계를 평가한다면, 아래 어느 단계라고 보십니까?',
				'q3a' => 'a. 태동단계: 기술이 언론과 대중의 관심을 받기 시작하는 시기',
				'q3b' => 'b. 거품단계: 장밋빛 전망으로 기대감이 최고조에 이르는 단계',
				'q3c' => 'c. 거품제거단계: 적용사례가 늘면서 한계점 등이 드러나는 단계',
				'q3d' => 'd. 재조명단계: 시장, 언론은 냉담하나 실질적인 투자가 이루어지는 단계',
				'q3e' => 'e. 안정 단계: 기술이 성숙하고 안정적으로 보급, 확산되는 단계',

				'q4' => '4. 우리나라에서 최근 BIM을 사용하기 시작하는 사람들은 다음 중 주로 어떤 유형의 사람들이라고 생각하십니까? 1번부터 5번으로 갈수록 기술도입을 늦게 하는 유형의 사람들입니다.',
				'q4a' => 'a. 혁신자: 기술이 일반적으로 알려지기도 전에 제일 먼저 기술을 도입하는 사람들',
				'q4b' => 'b. 얼리어답터(빠른 도입자): 기술이 알려질 무렵 바로 기술을 도입하는 사람들',
				'q4c' => 'c. 초기도입자: 평균보다 도입이 빠른 다수의 사용자들',
				'q4d' => 'd. 후기도입자: 평균보다 도입이 늦은 다수의 사용자들',
				'q4e' => 'e. 늦깎이 도입자: 다른 사람이 기술을 다 도입하고 가장 마지막 단계에서 기술을 도입하는 사람들',

				'q5' => '5. 프로젝트 생애주기별로 봤을 때, 귀하께서 생각하시는 우리나라의 각 단계별 BIM 도입정도를 평가해 주십시오.',
				'q5th1' => '생애주기',
				'q5th2' => '느껴지는 BIM 활용정도 (%)',
				'q5th3' => '기술단계(1~5)(4번 문항 참조)',
				'q5th4' => '최근 BIM을 사용하기 시작한 사용자 유형(1~5)(5번 문항 참조)',
				'q5th5' => '비고/의견',

				'q5r1' => '기획단계',
				'q5r2' => '계획단계 (SD)',
				'q5r3' => '기본설계 (DD)',
				'q5r4' => '실시설계 (CD)',
				'q5r5' => '시공',
				'q5r6' => '운영 및 유지관리',




				'o1a' => '태동단계',
				'o1b' => '거품단계',
				'o1c' => '거품제거단계',
				'o1d' => '재조명단계',
				'o1e' => '안정 단계',
				'o1x' => '선택',
				'select' => '선택',

				'o2a' => '혁신자',
				'o2b' => '얼리어답터(빠른 도입자)',
				'o2c' => '초기도입자',
				'o2d' => '후기도입자',
				'o2e' => '늦깎이 도입자',
				'o2x' => '선택',


				
				'q6' => '6. BIM 활성화 요소 및 중요도 평가, 다음은 우리나라가 BIM도입을 위해 극복해야 할 문제점들을 나열한 것입니다. 아래 항목의 영향도를 평가해 주십시오. 1번부터 5번으로 갈수록 영향도가 높은 것입니다.(중요도 : 1=중요하지 않음, 5=매우 중요함)',
				'q6th1' => '극복 요소',
				'q6th2' => '중요도(1–5)',
				'q6th3' => '비고/의견',
				'q6r1' => '낮은 설계비',
				'q6r2' => '건설시장 위축으로 인한 과다 경쟁',
				'q6r3' => '건설사 주도의 시장구조',
				'q6r4' => '과도하게 잦은 설계변경',
				'q6r5' => '최대기한을 넘기는 늦은 의사결정',
				'q6r6' => '설계도서의 낮은 완성도 및 품질',
				'q6r7' => '상달하복적 구조로 인한 의사소통의 어려움',
				'q6r8' => '무리한 발주처의 요구 ',
				'q6r9' => '본사의 지원부족',
				'q6r10' => '현장의 의지부족 또는 신기술 도입에 대한 저항감',
				'q6r11' => '무리한 수주로 인한 예산 및 공기 부족',
				'q6r12' => 'BIM 설계에 대한 보상 부족',
				'q6r13' => 'BIM 능력을 가진 협력업체 부족',
				'q6r14' => 'BIM 능력을 가진 직원 부족',
				'q6r15' => 'BIM 소프트웨어들의 국내 필요기능 및 라이브러리 지원 부족',
				'q6r16' => '기타',



				'q7' => '7. BIM을 사용하고 계십니까?',
				'yes' => '그렇다',
				'no' => '아니다',
				'q7a' => '이미 BIM을 ',
				'q7b' => '년째 사용 중이다.',

				'parta' => '[A] BIM 비사용자 문항',
				'qa1' => '1. 아래는 BIM을 도입하지 않는 이유들입니다. 귀사에서 BIM 도입을 하지 않는 이유에 가장 근접하다고 생각되면 5점을, 가장 거리가 멀다고 생각되면 1점을 주십시오.',
				'qa1th1' => '도입하지 않는 이유',
				'qa1th2' => '중요도(1-5)',
				'qa1th3' => '비고/의견',
				'qa1r1' => '기능이 우리가 하는 일에 적용이 잘 안 된다',
				'qa1r2' => '아직 충분히 검토해볼 시간이 없었다',
				'qa1r3' => '현재 방식이 더 낫다',
				'qa1r4' => '거래처의 요구가 없다',
				'qa1r5' => '소프트웨어가 너무 비싸다',
				'qa1r6' => '필요한 하드웨어(컴퓨터가) 너무 비싸다',
				'qa1r7' => '소프트웨어 사용이 어렵다',
				'qa1r8' => '소프트웨어 교육이 부족하다',
				'qa1r9' => '내가 필요한 BIM 관련한 라이브러리 등이 부족하다',
				'qa1r10' => 'CAD 시스템과 BIM 시스템의 정보호환이 원활치 않다',
				'qa1r11' => '보험과 책임문제에 대한 우려가 있다',
				'qa2' => '2. 아래는 일반적으로 BIM을 도입하는 목적들입니다. 향후 귀사에서 BIM 도입을 고려한다면, BIM 도입에 영향을 가장 많이 미칠 수 있다고 생각되는 항목은 5점, 영향을 거의 미치지 않을 것이라고 생각이 되면 1점을 주십시오',
				'qa2th1' => '도입 목적',
				'qa2th2' => '중요도(1-5)',
				'qa2th3' => '비고/의견',
				
				'qa2r1' => '지속 가능한 설계와 시공을 할 수 있는 향상된 능력',
				'qa2r2' => '일정/공정관리 능력 향상',
				'qa2r3' => '예산 계획 및 견적 능력 향상',
				'qa2r4' => '린 건설 기술을 활용할 수 있는 능력 향상(린 건설기술은 낭비를 줄이고 계획을 최적화하기 위해 린건설협회에서 정의한 원칙들에 기반한 건설관리 기술을 말합니다.)',
				'qa2r5' => '설계, 시공자 등 모든 프로젝트 참여간의 의사소통 향상',
				'qa2r6' => '도면작성 시간이 줄어듬에 따른 설계(디자인) 시간 증가',
				'qa2r7' => '법규나 설계기준 검토능력 향상',
				'qa2r8' => '설계변수의 수정 용이성 증대',
				'qa2r9' => '공사비의 절감',
				'qa2r10' => '공사시간의 감소',
				'qa2r11' => '법적 또는 보험 소송의 감소',
				'qa2r12' => '현장의 안전성 증진',
				'qa2r13' => '발주처의 요구에 따른 도입',
				'qa2r14' => '정보요청 관련 공문 (REF: Request for Information)의 감소',
				'qa2r15' => '현장 조율 문제의 감소',
				'qa2r16' => '시공도서의 정확성 향상',
				'qa2r17' => '향상된 시설물 관리 및 운영',
				'qa2r18' => '디지털 패브리케이션 (digital fabrication) 능력향상(디지털 패브리케이션(digital fabrication)이란 컴퓨터 모델로부터 얻은 디지털 정보를 자동화 생산기계에 입력하여 철골, 덕트, 외장패널, 파티션 등 건설자재나 부품을 자동으로 생산하는 기술을 말합니다.)',
				
				
				'qa3' => '3. 5년 뒤 건설산업에서 BIM이 얼마나 중요해질 것이라고 예상하십니까?',
				'qa3a' => 'a. 전혀 중요하지 않다',
				'qa3b' => 'b. 좀 중요해진다',
				'qa3c' => 'c. 꽤 중요해진다',
				'qa3d' => 'd. 매우 중요해진다',
				'qa3e' => 'e. 필수적이 된다',
				'partb' => '[B] BIM 사용자 문항',
				'qb1' => '1. 현재 회사 전체 프로젝트 중 대략 몇 퍼센트 정도 BIM을 적용하고 있습니까? ',
				'qb2' => '2. 본인 회사의 BIM 전문성은 어느 수준이라고 생각하십니까?',
				'qb2a' => 'a.	초보',
				'qb2b' => 'b.	중간',
				'qb2c' => 'c.	고급',
				'qb2d' => 'd.	전문가',
				'qb3' => '3. 아래 표는 주요한 BIM 기능에 대한 내용입니다. 현재 주요근무지에서 주로 사용하는 BIM 기능들을 모두 선택해주십시오',
				'qb3th1' => 'BIM 기능',
				'qb3th2' => '사용 여부',
				'qb3th3' => '비고/의견',
				'qb3r1' => '현장 또는 기존 건물 현황분석을 위한 모델링',
				'qb3r2' => '견적 및 물량산출',
				'qb3r3' => '공정계획',
				'qb3r4' => '공간계획',
				'qb3r5' => '대지분석',
				'qb3r6' => '설계모델링',
				'qb3r7' => '구조해석',
				'qb3r8' => '에너지 분석 (설비, 조명 등)',
				'qb3r9' => '3D 간섭 조율',
				'qb3r10' => '3차원 기반의 작업통제 및 계획',
				'qb3r11' => '준공상태기록을 위한 모델링',
				'qb3r12' => '유지보수 계획',
				'qb3r13' => '건물 시스템 (설비, 외피, 에너지 등) 분석'

				
			);
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "russian"){
						$data = array(
		
				'language' => $language,
				
				'h1' => 'Опрос 2015 года о внедрении и применении BIM (информационного моделирования строительства)',
				
				'employee'=>'',
			
				'q1' => '1. Примерно сколько сотрудников в настоящее время работает в вашей компании? ',
				'q2' => '2. На ваш взгляд, в настоящее время в каком проценте проектов в вашей стране используется BIM (там, где вы сейчас работаете, если вы работаете за границей)?',
				'q3' => '3. По вашему мнению, на какой стадии сейчас находится внедрение BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей) с точки зрения зрелости технологии?',
				'q3a' => 'a.	Технологический триггер. Период, в течение которого технология вызывает интерес у средств массовой информации и промышленности. Пригодные к использованию продукты могут еще не существовать.',
				'q3b' => 'b.	Пик завышенных ожиданий. Период, в течение которого ожидания, связанные с технологией, находятся на пике из-за оптимистичных ожиданий.',
				'q3c' => 'c.	Избавление от иллюзий. Период, в течение которого подтверждаются ограничения технологии.',
				'q3d' => 'd.	Преодоление недостатков. Период осуществления практических инвестиций в технологию, несмотря на пессимистическую реакцию средств массовой информации и отрасли. ',
				'q3e' => 'e.	Плато продуктивности. Период, во время которого технология становится зрелой и стабильно работает на соответствующих рынках.',

				'q4' => '4. Какой основной тип пользователя, который недавно начал использовать BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей)?',
				'q4a' => 'a.	Новаторы. Пользователи, которые самыми первыми воспринимают технологи., прежде чем она становится известной.',
				'q4b' => 'b.	Ранние последователи. Пользователи, которые воспринимают технологию, как только она становится известной.',
				'q4c' => 'c.	Раннее большинство. Пользователи, которые воспринимают технологию до того, как ее воспримет средний член общества.',
				'q4d' => 'd.	Позднее большинство. Пользователи, которые воспринимают технологию после того, как ее воспримет средний член общества.',
				'q4e' => 'e.	Поздние последователи. Пользователи, которые воспринимают технологию на поздних стадиях ее существования.',

				'q5' => '5. Как вы оцениваете состояние внедрения BIM в вашей стране (там, где вы в настоящее время работаете, если вы работаете за границей) на каждом этапе следующих жизненных циклов строительства: ',
				'q5th1' => 'Жизненный цикл',
				'q5th2' => 'Воспринимаемый коэффициент внедрения (%)',
				'q5th3' => 'Технологическая зрелость (1-5)(см. вопрос 4)',
				'q5th4' => 'Тип недавних пользователей(1-5)(см. вопрос 5)',
				'q5th5' => 'Мнение',

				'q5r1' => 'Планирование',
				'q5r2' => 'Эскизный проект (ЭП)',
				'q5r3' => 'Разработка проекта (РП)',
				'q5r4' => 'Строительный проект (СП)',
				'q5r5' => 'Строительство',
				'q5r6' => 'Эксплуатация и техническое обслуживание:',




				'o1a' => 'Технологический триггер',
				'o1b' => 'Пик завышенных ожиданий',
				'o1c' => 'Избавление от иллюзий',
				'o1d' => 'Преодоление недостатков',
				'o1e' => 'Плато продуктивности',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Новаторы',
				'o2b' => 'Ранние последователи',
				'o2c' => 'Раннее большинство',
				'o2d' => 'Позднее большинство',
				'o2e' => 'Поздние последователи',
				'o2x' => 'Select',


				
				'q6' => '6. Ниже приведен список препятствий внедрению BIM. Просьба оценить влияние каждого элемента по шкале от 1 до 5, где 1 — самое слабое влияние, а 5 — самое сильное влияние.',
				'q6th1' => 'Препятствие',
				'q6th2' => 'Влияние(1-5)',
				'q6th3' => 'Мнение',
				'q6r1' => 'Низкая плата за проектирование',
				'q6r2' => 'Высокий уровень конкуренции в результате застоя на строительном рынке',
				'q6r3' => 'Условия на рынке диктуют подрядчики',
				'q6r4' => 'Слишком частые изменения проекта',
				'q6r5' => 'Запоздалые решения после истечения жестких сроков',
				'q6r6' => 'Низкое качество строительной документации',
				'q6r7' => 'Коммуникационные трудности из-за ограниченной иерархической социальной структуры',
				'q6r8' => 'Чрезмерные требования заказчика ',
				'q6r9' => 'Недостаточная поддержка со стороны штаб-квартиры',
				'q6r10' => 'Незнание или сопротивление новой технологии',
				'q6r11' => 'Низкий бюджет и малая продолжительность проекта из-за приобретения плохих проектов',
				'q6r12' => 'Недостаточные стимулы для проектирования на основе BIM',
				'q6r13' => 'Недостаточное число субподрядчиков с возможностями использования BIM',
				'q6r14' => 'Недостаточное число работников, умеющих использовать BIM',
				'q6r15' => 'Недостаток совместимого с BIM контента для моих потребностей',
				'q6r16' => 'Прочее (просьба пояснить)',



				'q7' => '7. Используете ли вы BIM?',
				'yes' => 'Да',
				'no' => 'Нет',
				'q7a' => 'я использую BIM ',
				'q7b' => 'год (года, лет).',

				'parta' => 'Вопросы части [А] для тех, кто не использует BIM',
				'qa1' => '1. Пожалуйста, оцените важность каждой из следующих причин отказа от внедрения BIM в вашей компании, используя шкалу от 1 до 5, где 1 —отсутствие влияния на ваше решение не использовать BIM, а 5 — наибольшее влияние на ваше решение не использовать BIM:',
				'qa1th1' => 'Причины отказа от BIM',
				'qa1th2' => 'Влияние(1-5)',
				'qa1th3' => 'Мнение',
				'qa1r1' => 'Функциональность не слишком важна в том, что мы делаем.',
				'qa1r2' => 'У нас не было достаточно времени для оценки BIM.',
				'qa1r3' => 'Мы считаем, что нынешние методы, которые мы используем, лучше.',
				'qa1r4' => 'Недостаточный спрос со стороны заказчиков и/или других фирм на использование BIM в проектах.',
				'qa1r5' => 'Слишком высокая стоимость программного обеспечения.',
				'qa1r6' => 'Слишком высокая стоимость необходимой модернизации оборудования.',
				'qa1r7' => 'Программное обеспечение слишком сложное в использовании.',
				'qa1r8' => 'Недостаточность доступного обучения.',
				'qa1r9' => 'Недостаток совместимого с BIM контента для моих потребностей.',
				'qa1r10' => 'Плохая операционная совместимость BIM с CAD-приложениями.',
				'qa1r11' => 'У нас есть опасения относительно страхования и/или ответственности.',
				'qa2' => '2. Используя шкалу от 1 до 5, пожалуйста, оцените следующие пункты с точки зрения их воздействия на решение вашей организации о внедрении BIM в будущем, где 1 — это отсутствие влияния на ваше решение о внедрении BIM, а 5 — наибольшее влияние на ваше решение о внедрении BIM.',
				'qa2th1' => 'Ожидаемые выгоды от внедрения BIM',
				'qa2th2' => 'Влияние(1-5)',
				'qa2th3' => 'Мнение',
				'qa2r1' => 'Лучшие возможности осуществления экологичного проектирования и строительства',
				'qa2r2' => 'Лучшие возможности составления графиков',
				'qa2r3' => 'Лучшие возможности бюджетирования и составления смет расходов.',
				'qa2r4' => 'Лучшие возможности использования методов бережливого строительства (методы бережливого строительства основаны на принципах, которые сформулированы Институтом бережливого строительства, и позволяют до минимума сократить отходы и оптимизировать планирование)',
				'qa2r5' => 'Улучшение коммуникации между всеми сторонами в процессе проектирования и строительства',
				'qa2r6' => 'Поскольку меньше времени уделяется подготовке эскизов, больше времени остается на проектирование',
				'qa2r7' => 'Улучшенная проверка соответствия кодексам и/или стандартам',
				'qa2r8' => 'Изменение параметров проектирования',
				'qa2r9' => 'Сокращение затрат на строительство',
				'qa2r10' => 'Сокращение запланированных сроков строительства ',
				'qa2r11' => 'Сокращение числа судебных и/или страховых претензий',
				'qa2r12' => 'Более безопасные строительные площадки',
				'qa2r13' => 'Спрос со стороны владельцев на использование BIM в их проектах',
				'qa2r14' => 'Снижение необходимости в запросах информации и их количества',
				'qa2r15' => 'Уменьшение числа проблем с координацией на местах',
				'qa2r16' => 'Более точная проектно-сметная документация',
				'qa2r17' => 'Улучшение текущего обслуживания и управления объектом',
				'qa2r18' => 'Улучшенные возможности цифрового производства(Цифровое производство — это технология, которая позволяет автоматически производить строительные материалы и компоненты, такие как стальные конструкции, воздуховоды, внешние панели и перегородки, посредством ввода цифровой модели в компьютерную модель)',
				'qa3' => '3. По вашему мнению, каков будет уровень важности BIM в отрасли через пять лет?',
				'qa3a' => 'a.	Не важно',
				'qa3b' => 'b.	Низкая важность',
				'qa3c' => 'c.	Умеренная важность',
				'qa3d' => 'd.	Высокая важность',
				'qa3e' => 'e.	Очень высокая важность',
				'partb' => 'Вопросы части [B] для пользователей BIM',
				'qb1' => '1. В каком проценте проектов вашей компании используется BIM? ',
				'qb2' => '2. Что лучше всего описывает уровень опыта вашей компании в сфере BIM?',
				'qb2a' => 'a.	Начальный',
				'qb2b' => 'b.	Средний',
				'qb2c' => 'c.	Продвинутый',
				'qb2d' => 'd.	Экспертный',
				'qb3' => '3. Ниже приведен список основных услуг BIM. Пожалуйста, укажите все услуги BIM, которые, как вы считаете, используются в вашей компании.',
				'qb3th1' => 'Услуги BIM',
				'qb3th2' => 'Используется',
				'qb3th3' => 'Мнение',
				'qb3r1' => 'Моделирование текущих условий',
				'qb3r2' => 'Оценка затрат/количеств',
				'qb3r3' => 'Этап планирования (составления графика)',
				'qb3r4' => 'Пространственное планирование',
				'qb3r5' => 'Анализ площадки',
				'qb3r6' => 'Моделирование/авторская разработка проекта',
				'qb3r7' => 'Расчет конструкции',
				'qb3r8' => 'Энергоанализ (механический, освещения и т.д.)',
				'qb3r9' => '3D-координация',
				'qb3r10' => '3D-контроль и планирование',
				'qb3r11' => 'Моделирование учетной документации',
				'qb3r12' => 'Планирование технического обслуживания',
				'qb3r13' => 'Анализ конструктивной системы здания'

				
			);
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "arabic"){
		$data = array(
		
				'language' => $language,
				
				'h1' => 'استطلاع الرأي لاعتماد وتطبيق نمذجة معلومات المبنى "BIM" لعام 2015',
				
				'employee'=>'Employees',
			
				'q1' => '1. كم يبلغ عدد الموظفين الذين يعملون حالياً في شركتك تقريباً ؟ ',
				'q2' => '2. في رأيك الشخصي، ما هي النسبة المئوية للمشروعات التي تستخدم نمذجة معلومات المبنى BIM حالياً في بلدك     (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك)؟',
				'q3' => '3. إلى أي مرحلة باعتقادك وصلت نمذجة معلومات المبنى BIM في بلدك (حيث تعمل حالياً إن كنت تعمل خارج بلدك) من ناحية نضوج التكنولوجيا؟',
				'q3a' => 'أ. إطلاق التكنولوجيا: وهي الفترة التي تجذب فيها التكنولوجيا اهتمام وسائل الإعلام ورجال الصناعة. المنتجات القابلة للاستخدام قد تكون غير موجودة بعد.',
				'q3b' => 'ب. قمة التوقعات المضخمة: وهي الفترة التي تكون فيها التوقعات المتعلقة بالتكنولوجيا في ذروتها، كنتيجة للتوقعات المتفائلة.',
				'q3c' => 'ج. هُوة خيبة الأمل: وهي الفترة التي يتم فيها معرفة وإدراك قيود التكنولوجيا.',
				'q3d' => 'د. منحدر التنوير: وهي الفترة التي يتم فيها إجراء الاستثمار العملي في التكنولوجيا، بالرغم من ردود الأفعال المتشائمة من وسائل الإعلام ورجال الصناعة.',
				'q3e' => 'ه. هضبة الإنتاجية: وهي الفترة التي تنضج فيها التكنولوجيا، وتعمل بشكل مستقر في الأسواق المناسبة.',

				'q4' => '4. ما هو نوع المستخدم الرئيسي الذي بدأ حديثاً في اعتماد أو تبني نمذجة معلومات المبنى BIM في بلدك (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك)؟',
				'q4a' => 'أ. المبدعون: وهم المستخدمون الأوائل الذين يقومون بإستخدام تكنولوجيا معينة قبل أن تصبح معروفة.',
				'q4b' => 'ب. المُعتمِدِون الأوائل: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة عندما تصبح معروفة.',
				'q4c' => 'ج. الأغلبية الأوائل: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة قبل أفراد الطبقة المتوسطة من المجتمع.',
				'q4d' => 'د. الغالبية المتأخرة: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة بعد أفراد الطبقة المتوسطة من المجتمع..',
				'q4e' => 'ه. المتقاعسون: وهم المستخدمون الذين يقومون بإستخدام تكنولوجيا معينة في مراحل متأخرة من وجودها.',

				'q5' => '5. كيف تُقيم وضع اعتماد وتبني نمذجة معلومات المبنى BIM في بلدك (أو حيث تعمل حالياً إن كنت تعمل خارج بلدك) وهي مرحلة دورات الحياة الإنشائية التالية:',
				'q5th1' => 'دورة الحياة',
				'q5th2' => 'معدل الاعتماد المتوقع (%)',
				'q5th3' => 'نضوج التكنولوجيا(1-5)(راجع السؤال 4)',
				'q5th4' => 'نوع المستخدمون الجدد(1-5)(راجع السؤال 5)',
				'q5th5' => 'رأيك',

				'q5r1' => 'الخطة ',
				'q5r2' => 'التصمي التخطيطي   (SD)',
				'q5r3' => 'تطوير التصميم (DD)',
				'q5r4' => 'التصميم الإنشائي (CD)',
				'q5r5' => 'الإنشاءات',
				'q5r6' => 'التشغيل والصيانة',




				'o1a' => 'إطلاق التكنولوجيا',
				'o1b' => 'قمة التوقعات المضخمة',
				'o1c' => 'هُوة خيبة الأمل',
				'o1d' => 'منحدر التنوير',
				'o1e' => 'هضبة الإنتاجية',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'المبدعون',
				'o2b' => 'المُعتمِدِون الأوائل',
				'o2c' => 'الأغلبية الأوائل',
				'o2d' => 'الغالبية المتأخرة',
				'o2e' => 'المتقاعسون',
				'o2x' => 'Select',


				
				'q6' => '6. فيما يلي مجموعة من العوائق لعملية اعتماد نمذجة معلومات المبنى BIM. برجاء تقييم كل بند من 1 إلى 5 حيث رقم 1 هو أقل درجة تأثير، ورقم 5 هو أعلى درجة تأثير.',
				'q6th1' => 'العائق',
				'q6th2' => 'التأثير(1-5)',
				'q6th3' => 'رأيك',
				'q6r1' => 'رسم تصميم منخفض',
				'q6r2' => 'مستويات عالية من المنافسة نتيجة كساد سوق الإنشاءات ',
				'q6r3' => 'سيطرة المقاولين على السوق',
				'q6r4' => 'تغيير التصميم مراراً وتكراراً بشكل مبالغ فيه',
				'q6r5' => 'قرارات متأخرة بعد المواعيد النهائية الصعبة ',
				'q6r6' => 'وثائق  الإنشاءات ذات جودة منخفضة',
				'q6r7' => 'صعوبات الاتصال نتيجة بنية اجتماعية طبقية مُقيدة',
				'q6r8' => 'المطالب المفرطة  للعميل',
				'q6r9' => 'الدعم غير الكافي من المركز الرئيسي',
				'q6r10' => 'تجاهل أو مقاومة التكنولوجيا الجديدة',
				'q6r11' => 'الميزانية محدودة ، وفترة المشروع قصيرة نتيجة الاستحواذ على مشاريع سيئة',
				'q6r12' => 'الحوافز غير كافية لتصميم المبني على أساس نمذجة معلومات المبنى BIM',
				'q6r13' => 'نقص المقاولين الفرعيين ممن لديهم قدرات نمذجة معلومات المبنى BIM',
				'q6r14' => 'نقص الموظفين ممن لديهم قدرات نمذجة معلومات المبنى BIM',
				'q6r15' => 'المحتوى المتاح لاحتياجاتي والمتوافق مع نمذجة معلومات المبنى BIM غير كاف',
				'q6r16' => 'أخرى (برجاء التوضيح)',



				'q7' => '7. هل تستخدم نمذجة معلومات المبنى BIM؟',
				'yes' => 'نعم',
				'no' => 'لا',
				'q7a' => 'لقد كنت أستخدم نمذجة معلومات المبنى BIM لمدة ',
				'q7b' => 'سنة (سنوات)',

				'parta' => 'الجزء ]أ[ أسئلة لغير مستخدمي نمذجة معلومات المبنى BIM',
				'qa1' => '1. برجاء تقييم أهمية كل سبب من الأسباب التالية لعدم اعتماد نمذجة معلومات المبنى BIM في شركتك، مستخدماً المقياس من 1 إلى 5، حيث رقم 1 يعني عدم وجود تأثير على قرارك بسبب عدم استخدامك لنمذجة معلومات المبنى BIM، و رقم 5 يعني وجود أكبر تأثير على قرارك بسبب عدم استخدامك لنمذجة معلومات المبنى BIM:',
				'qa1th1' => 'أسباب عدم الاعتماد على BIM',
				'qa1th2' => 'التأثير(1-5)',
				'qa1th3' => 'رأيك',
				'qa1r1' => 'وظائف النمذجة لا تنطبق جيداً بشكل كاف على ما نفعله.',
				'qa1r2' => 'لا نمتلك الوقت الكافي لتقييمها. ',
				'qa1r3' => 'نحن نؤمن بأن الوسائل التي نستخدمها حالياً أفضل.',
				'qa1r4' => 'لا يوجد طلب كاف من العملاء و/أو الشركات الأخرى لكي نستخدم نمذجة معلومات المبنى BIM من أجل المشاريع التي ننفذها.',
				'qa1r5' => 'البرنامج مكلف للغاية.',
				'qa1r6' => 'التحديثات المطلوبة للأجهزة مكلفة للغاية.',
				'qa1r7' => 'البرنامج صعب جداً في استخدامه.',
				'qa1r8' => 'التدريب المتاح غير كاف.',
				'qa1r9' => 'المحتوى المتوافق مع نمذجة معلومات المبنى BIM والمتاح لاحتياجاتي غير كاف.',
				'qa1r10' => 'نمذجة معلومات المبنى BIM لديها قابلية تشغيل بيني ضعيفة مع تطبيقات التصميم بإستخدام الحاسوب (CAD)',
				'qa1r11' => 'لدينا مخاوف بشأن التأمين و/أو المسئولية.',
				'qa2' => '2. برجاء تقييم البنود التالية من ناحية تأثيرها على قرار مؤسستك فيما يتعلق باعتمادك على نمذجة معلومات المبنى BIM في المستقبل، مستخدماً المقياس من 1 إلى 5، حيث رقم 1 يعني عدم وجود تأثير على قرارك لكي تعتمد على نمذجة معلومات المبنى BIM في المستقبل، ورقم 5 يعني وجود أعظم تأثير على قرارك لكي تعتمد على نمذجة معلومات المبنى BIM في المستقبل.',
				'qa2th1' => 'المنافع المتوقعة جراء إعتماد BIM',
				'qa2th2' => 'التأثير(1-5)',
				'qa2th3' => 'رأيك',
				'qa2r1' => 'تحسين القدرة على القيام بتصميم وإنشاء مستدام.',
				'qa2r2' => 'تحسين قدرات الجدولة ',
				'qa2r3' => 'تحسين قدرات وضع الميزانية وتقدير التكاليف.',
				'qa2r4' => 'مقدرة مرتفعة على استخدام تقنيات الإنشاء الرشيق (تعتمد تقنيات الإنشاء الرشيق على مجموعة القواعد المنصوص عليها من جانب معهد الإنشاء الرشيق من أجل تقليل الفاقد وتحسين التخطيط)',
				'qa2r5' => 'اتصالات مُحسَّنَة بين جميع الأطراف في التصميم وعمليات الإنشاء',
				'qa2r6' => 'وقت أقل في وضع المسودات، ووقت أكثر للتصميم',
				'qa2r7' => 'فحص كود مُحسَّن و/أو التزام مُحسَّن بالكود',
				'qa2r8' => 'تعديل معايير التصميم',
				'qa2r9' => 'تكاليف إنشاء مُخفّضَة',
				'qa2r10' => 'جدول إنشاء مُخفَّض',
				'qa2r11' => 'تقليل الدعاوى القضائية و/أو مطالبات التأمين ',
				'qa2r12' => 'مواقع عمل أكثر أماناً ',
				'qa2r13' => 'مطالبة المالك بنمذجة معلومات المبنى BIM في مشروعاتهم',
				'qa2r14' => 'تقليل الاضطرار لطلبات المعلومات، وتقليل عددها',
				'qa2r15' => 'عدد مُخفَّض من مشاكل التنسيق الميداني',
				'qa2r16' => 'وثائق إنشاء أكثر دقة',
				'qa2r17' => 'صيانة عمليات مُحسَّنَة وإدارة مرافق مُحسَّنَة',
				'qa2r18' => 'مقدرة مُحسَّنَة على إنشاء تصنيع رقمي (التصنيع الرقمي هو تكنولوجيا تقوم تلقائياً بإنتاج مواد إنشاء أو مكونات،مثل هياكل الصلب، والقنوات أو المجاري، والألواح الخارجية، والحوائط الجاهزة، وذلك بواسطة وضع النموذج الرقمي بداخل نموذج الحاسب الآلي)',
				'qa3' => '3. ما مدى الأهمية التي ترى بأن نمذجة معلومات المبنى BIM ستكون عليها بالنسبة للصناعة في فترة الخمس سنوات القادمة؟',
				'qa3a' => 'أ‌.	لا أهمية',
				'qa3b' => 'ب‌.	أهمية منخفضة ',
				'qa3c' => 'ت‌.	أهمية متوسطة',
				'qa3d' => 'ث‌.	أهمية كبيرة',
				'qa3e' => 'ج‌.	أهمية كبيرة جداً',
				'partb' => 'الجزء ]ب[ أسئلة لمستخدمي نمذجة معلومات المبنى BIM',
				'qb1' => '1. ما هي النسبة  المئوية من مشاريع شركتك التي تستخدم نمذجة معلومات المبنى BIM؟',
				'qb2' => '2. أيا من الاختيارات التالية يصف بشكل أفضل مستوى خبرة شركتك بنمذجة معلومات المبنى BIM؟',
				'qb2a' => 'أ‌.	مبتدئ ',
				'qb2b' => 'ب‌.	متوسط',
				'qb2c' => 'ت‌.	متقدم',
				'qb2d' => 'ث‌.	خبير',
				'qb3' => '3. القائمة أدناه تعرض خدمات نمذجة معلومات المبنى BIM الرئيسية. برجاء الإشارة إلى جميع خدمات نمذجة معلومات المبنى BIM التي تعتقد بأنها مستخدمة في شركتك.',
				'qb3th1' => 'خدمات نمذجة معلومات المبنى BIM',
				'qb3th2' => 'قيد الاستخدام حاليا',
				'qb3th3' => 'رأيك',
				'qb3r1' => 'نمذجة الظروف القائمة',
				'qb3r2' => 'تقدير التكلفة/الكمية',
				'qb3r3' => 'تخطيط المرحلة (الجدولة)',
				'qb3r4' => 'التخطيط المكاني',
				'qb3r5' => 'تحليل الموقع',
				'qb3r6' => 'تأليف/نمذجة التصميم',
				'qb3r7' => 'تحليل هيكلي',
				'qb3r8' => 'تحليل الطاقة (طاقة ميكانيكية، طاقة الإضاءة، الخ)',
				'qb3r9' => 'تنسيق ثلاثي الأبعاد',
				'qb3r10' => 'تحكم وتخطيط ثلاثي الأبعاد',
				'qb3r11' => 'نمذجة السجل',
				'qb3r12' => 'جدولة الصيانة',
				'qb3r13' => 'تحليل نظام المبنى'

				
			);
		
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else if($language == "spanish"){
						$data = array(
		
				'language' => $language,
				
				'h1' => 'Encuesta 2015 de adopción e implementación de BIM',
				
				'employee'=>'',
			
				'q1' => '1. Aproximadamente, ¿cuántos empleados trabajan para su empresa?  ',
				'q2' => '2. En su opinión, ¿qué porcentaje de proyectos actualmente están utilizando BIM en  su país? (donde esté trabajando actualmente si está trabajando en el extranjero) ',
				'q3' => '3. ¿En qué fase cree que BIM está en su país (donde esté trabajando actualmente si está trabajando en el extranjero) en términos de madurez de la tecnología?',
				'q3a' => 'a.	Activación de tecnología: El período durante el cual una tecnología atrae el interés de los medios de comunicación y la industria. Podrían aun no existir productos utilizables.',
				'q3b' => 'b.	Pico de expectativas infladas: El período durante el cual las expectativas relacionadas con la tecnología alcanzan un pico debido a una anticipación optimista.',
				'q3c' => 'c.	Comedero de desilusión: El período durante el cual se reconocen las limitaciones de la tecnología.',
				'q3d' => 'd.	Incremento de la ilustración: El período durante el cual se hace una inversión práctica en la tecnología a pesar de las respuestas pesimistas de los medios de comunicación y la industria. ',
				'q3e' => 'e.	Meseta de productividad: El período durante el cual la tecnología madura y está funcionando de forma estable en los mercados correspondientes.',

				'q4' => '4. ¿Cuál es el principal tipo de usuario que ha iniciado recientemente el uso de BIM en su país? (donde esté trabajando actualmente si está trabajando en el extranjero)',
				'q4a' => 'a.	Innovadores: Los primeros usuarios que adoptan una tecnología antes de que sea conocida.',
				'q4b' => 'b.	Los primeros en adoptar: Los usuarios que adoptan una tecnología cuando se conoce.',
				'q4c' => 'c.	Mayoría temprana: Los usuarios que adoptan una tecnología antes que el miembro medio de la sociedad.',
				'q4d' => 'd.	Mayoría tardía: Los usuarios que adoptan una tecnología después que el miembro medio de la sociedad.',
				'q4e' => 'e.	Rezagados: Los usuarios que adoptan una tecnología en las últimas etapas de su existencia.',

				'q5' => '5. ¿Cómo evaluaría el estado de adopción de BIM en su país (donde esté trabajando actualmente si está trabajando en el extranjero) en cada fase de los siguientes ciclos de vida de creación? ',
				'q5th1' => 'Ciclo de vida',
				'q5th2' => 'Tasa de adopción percibida (%)',
				'q5th3' => 'Madurez de la tec. (1-5)(ref. pregunta 4)',
				'q5th4' => 'Tipo de usuarios recientes(1-5)(ref. pregunta 5)',
				'q5th5' => 'Opinión',

				'q5r1' => 'Plan',
				'q5r2' => 'Diseño esquemático (SD)',
				'q5r3' => 'Desarrollo del diseño (DD)',
				'q5r4' => 'Diseño de construcción (CD)',
				'q5r5' => 'Construcción',
				'q5r6' => 'Operaciones y mantenimiento',




				'o1a' => 'Activación de tecnología',
				'o1b' => 'Pico de expectativas infladas',
				'o1c' => 'Comedero de desilusión',
				'o1d' => 'Incremento de la ilustración',
				'o1e' => 'Meseta de productividad',
				'o1x' => 'Select',
				'select' => 'Select',

				'o2a' => 'Innovadores',
				'o2b' => 'Los primeros en adoptar',
				'o2c' => 'Mayoría temprana',
				'o2d' => 'Mayoría tardía',
				'o2e' => 'Rezagados',
				'o2x' => 'Select',


				
				'q6' => '6. La siguiente es una lista de los obstáculos para la adopción de BIM. Por favor, evalúe el impacto de cada artículo del 1 al 5, donde 1 es el impacto más bajo y 5 es el más alto.',
				'q6th1' => 'Obstáculo',
				'q6th2' => 'Impacto(1-5)',
				'q6th3' => 'Opinión',
				'q6r1' => 'Cuota baja de diseño',
				'q6r2' => 'Altos niveles de competencia debidos a un mercado de la construcción congelado',
				'q6r3' => 'Mercado liderado por contratistas',
				'q6r4' => 'Cambios de diseño excesivamente frecuentes',
				'q6r5' => 'Decisiones tardías tras exigentes fechas de entrega',
				'q6r6' => 'Documentos de construcción de baja calidad',
				'q6r7' => 'Dificultades de comunicación debidas a una estructura social jerárquica restringida',
				'q6r8' => 'Demandas excesivas de los clientes ',
				'q6r9' => 'Insuficiente apoyo de la sede',
				'q6r10' => 'La ignorancia de, o resistencia a una nueva tecnología',
				'q6r11' => 'Bajo presupuesto y corta duración del proyecto debido a la adquisición de malos proyectos',
				'q6r12' => 'Incentivos insuficientes para el diseño basado en BIM',
				'q6r13' => 'Falta de subcontratistas con capacidades BIM',
				'q6r14' => 'Falta de empleados con capacidades BIM',
				'q6r15' => 'Insuficiente contenido compatible con BIM disponible para mis necesidades',
				'q6r16' => 'Otros (por favor, explique):',



				'q7' => '7. 7. ¿Utiliza BIM?',
				'yes' => 'Sí',
				'no' => 'No',
				'q7a' => 'he estado usando BIM durante',
				'q7b' => 'año(s).',

				'parta' => 'Parte [A] Preguntas para no usuarios de BIM',
				'qa1' => '1. Por favor, evalúe la importancia de cada una de las siguientes razones para no adoptar BIM en su empresa utilizando una escala de 1 a 5, donde 1 es ningún impacto en su decisión de no utilizar BIM y 5 el mayor impacto en su decisión de no utilizar BIM:',
				'qa1th1' => 'Razones para no adoptar BIM',
				'qa1th2' => 'Impacto(1-5)',
				'qa1th3' => 'Opinión',
				'qa1r1' => 'La funcionalidad no se aplica bien a lo que hacemos.',
				'qa1r2' => 'No hemos tenido tiempo suficiente para evaluarlo.',
				'qa1r3' => 'Creemos que los métodos actuales que utilizamos son mejores.',
				'qa1r4' => 'No hay suficiente demanda de los clientes y/u otras empresas para utilizar BIM para los proyectos.',
				'qa1r5' => 'El software es demasiado caro.',
				'qa1r6' => 'Las actualizaciones de hardware requeridas son demasiado caras.',
				'qa1r7' => 'El software es demasiado difícil de usar.',
				'qa1r8' => 'Insuficiente formación disponible.',
				'qa1r9' => 'Insuficiente contenido compatible con BIM disponible para mis necesidades',
				'qa1r10' => 'BIM tiene escasa interoperabilidad con aplicaciones CAD.',
				'qa1r11' => 'Tenemos preocupaciones sobre el seguro y/o responsabilidad.',
				'qa2' => '2. Utilizando una escala del 1 al 5, por favor puntúe los siguientes elementos en términos de su impacto en la decisión de su organización para adoptar BIM en el futuro, siendo 1 que no influye en su decisión de adoptar BIM y 5 el mayor impacto en su decisión de adoptar BIM.',
				'qa2th1' => 'Beneficios esperados de la adopción de BIM',
				'qa2th2' => 'Impacto(1-5)',
				'qa2th3' => 'Opinión',
				'qa2r1' => 'Habilidad mejorada para hacer un diseño y construcción sostenibles',
				'qa2r2' => 'La mejora de las capacidades de programación',
				'qa2r3' => 'La mejora de la presupuestación y la capacidad de estimación de costes',
				'qa2r4' => 'Mejor capacidad para utilizar técnicas de construcción austeras (técnicas de construcción austeras siguiendo los principios establecidos por el Lean Construction Institute para minimizar el desperdicio y optimizar la planificación)',
				'qa2r5' => 'Mejora de la comunicación entre todas las partes en los procesos de diseño y construcción',
				'qa2r6' => 'Menos tiempo haciendo borradores, más tiempo diseñando',
				'qa2r7' => 'Mejora de la comprobación de código y/o cumplimiento',
				'qa2r8' => 'Modificación de los parámetros de diseño',
				'qa2r9' => 'Reducción de los costes de construcción',
				'qa2r10' => 'Horario reducido de construcción',
				'qa2r11' => 'Reducción de las demandas judiciales y/o seguros',
				'qa2r12' => 'Lugares de trabajo más seguros',
				'qa2r13' => 'Demanda del propietario de BIM en sus proyectos',
				'qa2r14' => 'Necesidad reducida para, y el número de, solicitudes de información ',
				'qa2r15' => 'Reducción del número de problemas de coordinación sobre el terreno',
				'qa2r16' => 'Documentos de construcción más precisos',
				'qa2r17' => 'Mejora de las operaciones de mantenimiento y gestión de instalaciones',
				'qa2r18' => 'Capacidad mejorada para crear fabricación digital (la fabricación digital es una tecnología que produce automáticamente materiales o componentes de construcción, como marcos de acero, conductos, paneles exteriores y particiones, introduciendo el modelo digital en el modelo del ordenador)',
				'qa3' => '3. ¿Cuál cree usted que será la importancia de BIM para la industria en cinco años?',
				'qa3a' => 'a.	Sin importancia ',
				'qa3b' => 'b.	Importancia baja  ',
				'qa3c' => 'c.	Importancia moderada ',
				'qa3d' => 'd.	Importancia alta ',
				'qa3e' => 'e.	Importancia muy alta',
				'partb' => 'Parte [B] Preguntas para los usuarios de BIM',
				'qb1' => '1. ¿Qué porcentaje de los proyectos de su empresa utilizan BIM? ',
				'qb2' => '2. ¿Cuál describe mejor el nivel de experiencia BIM de su empresa?',
				'qb2a' => 'a.	Principiante ',
				'qb2b' => 'b.	Moderado',
				'qb2c' => 'c.	Avanzado',
				'qb2d' => 'd.	Experto',
				'qb3' => '3. La siguiente lista muestra los principales servicios de BIM. Indique todos los servicios BIM que usted piensa que se utilizan en su empresa.',
				'qb3th1' => 'Servicios BIM',
				'qb3th2' => 'Siendo utilizados',
				'qb3th3' => 'Opinión',
				'qb3r1' => 'Modelado de condiciones existentes',
				'qb3r2' => 'Estimación de costes/cantidades',
				'qb3r3' => 'Planificación de fases (programación)',
				'qb3r4' => 'Ordenación territorial',
				'qb3r5' => 'Análisis de las instalaciones',
				'qb3r6' => 'Modelado de diseño/autoría',
				'qb3r7' => 'Análisis estructural',
				'qb3r8' => 'Análisis de energía (mecánica, iluminación, etc.)',
				'qb3r9' => 'Coordinación 3D',
				'qb3r10' => 'Control 3D y planificación',
				'qb3r11' => 'Modelado de registros',
				'qb3r12' => 'Programación del mantenimiento',
				'qb3r13' => 'Análisis de sistemas de construcción'

				
			);
			Session::flash('message', "Please answer all the questions.");
			return View::make('slimbimsurvey.create')->with('data',$data);
		}else {

			Session::flash('message', "You have to select language.");
			return Redirect::back();
		}













			
			
		}else{


			$user = User::find(Auth::user()->id);
			if( $user->confirmed == 2){
				Session::flash('message','Sorry. You&#39;ve already participated in this survey. Can&#39;t participate twice.');
				return Redirect::to('slimbimsurvey/submitted');

			}else if( $user->confirmed == 1){


			
			
			$answer = new Answer;

			$answer->q0_company = Input::get('q0');
//q1			
			$answer->q1 = Input::get('q1');
//q2
			$answer->q2 = Input::get('q2');
//q3
			$answer->q3 = Input::get('q3');
//q4
			$answer->q4 = Input::get('q4');
//q5
			$answer->q5 = Input::get('q5');
//q6
			$answer->q6_q11 = Input::get('q6_q11');
			$answer->q6_q21 = Input::get('q6_q21');
			$answer->q6_q31 = Input::get('q6_q31');
			$answer->q6_q41 = Input::get('q6_q41');
			$answer->q6_q51 = Input::get('q6_q51');
			$answer->q6_q61 = Input::get('q6_q61');
			$answer->q6_q12 = Input::get('q6_q12');
			$answer->q6_q22 = Input::get('q6_q22');
			$answer->q6_q32 = Input::get('q6_q32');
			$answer->q6_q42 = Input::get('q6_q42');
			$answer->q6_q52 = Input::get('q6_q52');
			$answer->q6_q62 = Input::get('q6_q62');
			$answer->q6_q13 = Input::get('q6_q13');
			$answer->q6_q23 = Input::get('q6_q23');
			$answer->q6_q33 = Input::get('q6_q33');
			$answer->q6_q43 = Input::get('q6_q43');
			$answer->q6_q53 = Input::get('q6_q53');
			$answer->q6_q63 = Input::get('q6_q63');
			$answer->q6_q14 = Input::get('q6_q14');
			$answer->q6_q24 = Input::get('q6_q24');
			$answer->q6_q34 = Input::get('q6_q34');
			$answer->q6_q44 = Input::get('q6_q44');
			$answer->q6_q54 = Input::get('q6_q54');
			$answer->q6_q64 = Input::get('q6_q64');
//q7
			$answer->q7_q11 = Input::get('q7_q11');
			$answer->q7_q21 = Input::get('q7_q21');
			$answer->q7_q31 = Input::get('q7_q31');
			$answer->q7_q41 = Input::get('q7_q41');
			$answer->q7_q51 = Input::get('q7_q51');
			$answer->q7_q61 = Input::get('q7_q61');
			$answer->q7_q71 = Input::get('q7_q71');
			$answer->q7_q81 = Input::get('q7_q81');
			$answer->q7_q91 = Input::get('q7_q91');
			$answer->q7_q101 = Input::get('q7_q101');
			$answer->q7_q111 = Input::get('q7_q111');
			$answer->q7_q121 = Input::get('q7_q121');
			$answer->q7_q131 = Input::get('q7_q131');
			$answer->q7_q141 = Input::get('q7_q141');
			$answer->q7_q151 = Input::get('q7_q151');
			$answer->q7_q161 = Input::get('q7_q161');
			$answer->q7_q12 = Input::get('q7_q12');
			$answer->q7_q22 = Input::get('q7_q22');
			$answer->q7_q32 = Input::get('q7_q32');
			$answer->q7_q42 = Input::get('q7_q42');
			$answer->q7_q52 = Input::get('q7_q52');
			$answer->q7_q62 = Input::get('q7_q62');
			$answer->q7_q72 = Input::get('q7_q72');
			$answer->q7_q82 = Input::get('q7_q82');
			$answer->q7_q92 = Input::get('q7_q92');
			$answer->q7_q102 = Input::get('q7_q102');
			$answer->q7_q112 = Input::get('q7_q112');
			$answer->q7_q122 = Input::get('q7_q122');
			$answer->q7_q132 = Input::get('q7_q132');
			$answer->q7_q142 = Input::get('q7_q142');
			$answer->q7_q152 = Input::get('q7_q152');
			$answer->q7_q162 = Input::get('q7_q162');
//q8
			$answer->q8 = Input::get('q8');
			$answer->q8_years = Input::get('q8_years');
//qa1
			$answer->qa1_q11 = Input::get('qa1_q11');
			$answer->qa1_q21 = Input::get('qa1_q21');
			$answer->qa1_q31 = Input::get('qa1_q31');
			$answer->qa1_q41 = Input::get('qa1_q41');
			$answer->qa1_q51 = Input::get('qa1_q51');
			$answer->qa1_q61 = Input::get('qa1_q61');
			$answer->qa1_q71 = Input::get('qa1_q71');
			$answer->qa1_q81 = Input::get('qa1_q81');
			$answer->qa1_q91 = Input::get('qa1_q91');
			$answer->qa1_q101 = Input::get('qa1_q101');
			$answer->qa1_q111 = Input::get('qa1_q111');
			$answer->qa1_q12 = Input::get('qa1_q12');
			$answer->qa1_q22 = Input::get('qa1_q22');
			$answer->qa1_q32 = Input::get('qa1_q32');
			$answer->qa1_q42 = Input::get('qa1_q42');
			$answer->qa1_q52 = Input::get('qa1_q52');
			$answer->qa1_q62 = Input::get('qa1_q62');
			$answer->qa1_q72 = Input::get('qa1_q72');
			$answer->qa1_q82 = Input::get('qa1_q82');
			$answer->qa1_q92 = Input::get('qa1_q92');
			$answer->qa1_q102 = Input::get('qa1_q102');
			$answer->qa1_q112 = Input::get('qa1_q112');
//qa2
			$answer->qa2_q11 = Input::get('qa2_q11');
			$answer->qa2_q21 = Input::get('qa2_q21');
			$answer->qa2_q31 = Input::get('qa2_q31');
			$answer->qa2_q41 = Input::get('qa2_q41');
			$answer->qa2_q51 = Input::get('qa2_q51');
			$answer->qa2_q61 = Input::get('qa2_q61');
			$answer->qa2_q71 = Input::get('qa2_q71');
			$answer->qa2_q81 = Input::get('qa2_q81');
			$answer->qa2_q91 = Input::get('qa2_q91');
			$answer->qa2_q101 = Input::get('qa2_q101');
			$answer->qa2_q111 = Input::get('qa2_q111');
			$answer->qa2_q121 = Input::get('qa2_q121');
			$answer->qa2_q131 = Input::get('qa2_q131');
			$answer->qa2_q141 = Input::get('qa2_q141');
			$answer->qa2_q151 = Input::get('qa2_q151');
			$answer->qa2_q161 = Input::get('qa2_q161');
			$answer->qa2_q171 = Input::get('qa2_q171');
			$answer->qa2_q181 = Input::get('qa2_q181');
			$answer->qa2_q12 = Input::get('qa2_q12');
			$answer->qa2_q22 = Input::get('qa2_q22');
			$answer->qa2_q32 = Input::get('qa2_q32');
			$answer->qa2_q42 = Input::get('qa2_q42');
			$answer->qa2_q52 = Input::get('qa2_q52');
			$answer->qa2_q62 = Input::get('qa2_q62');
			$answer->qa2_q72 = Input::get('qa2_q72');
			$answer->qa2_q82 = Input::get('qa2_q82');
			$answer->qa2_q92 = Input::get('qa2_q92');
			$answer->qa2_q102 = Input::get('qa2_q102');
			$answer->qa2_q112 = Input::get('qa2_q112');
			$answer->qa2_q122 = Input::get('qa2_q122');
			$answer->qa2_q132 = Input::get('qa2_q132');
			$answer->qa2_q142 = Input::get('qa2_q142');
			$answer->qa2_q152 = Input::get('qa2_q152');
			$answer->qa2_q162 = Input::get('qa2_q162');
			$answer->qa2_q172 = Input::get('qa2_q172');
			$answer->qa2_q182 = Input::get('qa2_q182');
//qa3
			$answer->qa3 = Input::get('qa3');
//qb1
			$answer->qb1 = Input::get('qb1');
//qb2
			$answer->qb2 = Input::get('qb2');
//qb3
			$answer->qb3_q11 = Input::get('qb3_q11');
			$answer->qb3_q21 = Input::get('qb3_q21');
			$answer->qb3_q31 = Input::get('qb3_q31');
			$answer->qb3_q41 = Input::get('qb3_q41');
			$answer->qb3_q51 = Input::get('qb3_q51');
			$answer->qb3_q61 = Input::get('qb3_q61');
			$answer->qb3_q71 = Input::get('qb3_q71');
			$answer->qb3_q81 = Input::get('qb3_q81');
			$answer->qb3_q91 = Input::get('qb3_q91');
			$answer->qb3_q101 = Input::get('qb3_q101');
			$answer->qb3_q111 = Input::get('qb3_q111');
			$answer->qb3_q121 = Input::get('qb3_q121');
			$answer->qb3_q131 = Input::get('qb3_q131');
			$answer->qb3_q12 = Input::get('qb3_q12');
			$answer->qb3_q22 = Input::get('qb3_q22');
			$answer->qb3_q32 = Input::get('qb3_q32');
			$answer->qb3_q42 = Input::get('qb3_q42');
			$answer->qb3_q52 = Input::get('qb3_q52');
			$answer->qb3_q62 = Input::get('qb3_q62');
			$answer->qb3_q72 = Input::get('qb3_q72');
			$answer->qb3_q82 = Input::get('qb3_q82');
			$answer->qb3_q92 = Input::get('qb3_q92');
			$answer->qb3_q102 = Input::get('qb3_q102');
			$answer->qb3_q112 = Input::get('qb3_q112');
			$answer->qb3_q122 = Input::get('qb3_q122');
			$answer->qb3_q132 = Input::get('qb3_q132');		

					
			$answer->save();

			$user->confirmed = 2;
			$user->save();

			Session::flash('message','Successfully Submitted!');
			return Redirect::to('slimbimsurvey/submitted');
			}else{

			Session::flash('message','It&#39;s wrong access.');
			return Redirect::to('slimbimsurvey/submitted');

			}
			
		}
		return Input::all();
	}
	
	public function show($id)
	{
	}
	
	public function edit($id)
	{
	}
	
	public function update($id)
	{
	}
	
	public function destroy($id)
	{
		$answer = Answer::find($id);
		$answer->delete();

		Session::flash('message','Successfully deleted!');
		return Redirect::to('slimbimsurvey');
	}
}
