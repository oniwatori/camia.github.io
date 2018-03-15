﻿/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.plugins.setLang( 'a11yhelp', 'fr', {
	title: 'Instructions d\'accessibilité',
	contents: 'Contenu de l\'aide. Pour fermer cette fenêtre, appuyez sur la touche Échap.',
	legend: [
		{
		name: 'Général',
		items: [
			{
			name: 'Barre d\'outils de l\'éditeur',
			legend: 'Appuyer sur ${toolbarFocus} pour accéder à la barre d\'outils. Se déplacer vers les groupes suivant ou précédent de la barre d\'outil avec les touches MAJ et MAJ+TAB. Se déplacer vers les boutons suivant ou précédent de la barre d\'outils avec les touches FLÈCHE DROITE et FLÈCHE GAUCHE. Appuyer sur la barre d\'espace ou la touche ENTRÉE pour activer le bouton de barre d\'outils.'
		},

			{
			name: 'Fenêtre de l\'éditeur',
			legend:
				'Dans une boîte de dialogue, appuyer sur Tab pour passer à l\'élément suivant, appuyer sur Maj+Tab pour passer à l\'élément précédent, appuyer sur Entrée pour valider, appuyer sur Échap pour annuler. Quand une boîte de dialogue possède des onglets, la liste peut être atteinte avec Alt+F10 ou avec Tab. Dans la liste des onglets, se déplacer vers le suivant et le précédent avec les flèches Droite et Gauche respectivement.'
		},

			{
			name: 'Menu contextuel de l\'éditeur',
			legend: 'Appuyer sur ${contextMenu} ou sur la touche Menu pour ouvrir le menu contextuel. Se déplacer ensuite vers l\'option suivante du menu avec la touche Tab ou la flèche Bas. Se déplacer vers l\'option précédente avec le raccourci Maj+Tab ou la flèche Haut. appuyer sur la Barre d\'espace ou la touche Entrée pour sélectionner l\'option du menu. Appuyer sur la Barre d\'espace, la touche Entrée ou la flèche Droite pour ouvrir le sous-menu de l\'option sélectionnée. Revenir à l\'élément de menu parent avec la touche Échap ou la flèche Gauche. Fermer le menu contextuel avec Échap.'
		},

			{
			name: 'Zone de liste de l\'éditeur',
			legend: 'Dans la liste en menu déroulant, se déplacer vers l\'élément suivant de la liste avec la touche Tab ou la flèche Bas. Se déplacer vers l\'élément précédent de la liste avec le raccourci Maj+Tab ou la flèche Haut. Appuyer sur la Barre d\'espace ou sur Entrée pour sélectionner l\'option dans la liste. Appuyer sur Échap pour fermer le menu déroulant.'
		},

			{
			name: 'Barre du chemin d\'éléments de l\'éditeur',
			legend: 'Appuyer sur ${elementsPathFocus} pour naviguer vers la barre du fil d\'Ariane des éléments. Se déplacer vers le bouton d\'élément suivant avec la touche Tab ou la flèche Droite. Se déplacer vers le bouton d\'élément précédent avec le raccourci Maj+Tab ou la flèche Gauche. Appuyer sur la Barre d\'espace ou sur Entrée pour sélectionner l\'élément dans l\'éditeur.'
		}
		]
	},
		{
		name: 'Commandes',
		items: [
			{
			name: ' Annuler la commande',
			legend: 'Appuyer sur ${undo}'
		},
			{
			name: 'Commande restaurer',
			legend: 'Appuyer sur ${redo}'
		},
			{
			name: ' Commande gras',
			legend: 'Appuyer sur ${bold}'
		},
			{
			name: ' Commande italique',
			legend: 'Appuyer sur ${italic}'
		},
			{
			name: ' Commande souligné',
			legend: 'Appuyer sur ${underline}'
		},
			{
			name: ' Commande lien',
			legend: 'Appuyer sur ${link}'
		},
			{
			name: ' Commande enrouler la barre d\'outils',
			legend: 'Appuyer sur ${toolbarCollapse}'
		},
			{
			name: 'Commande d\'accès à l\'élément sélectionnable précédent',
			legend: 'Appuyer sur ${accessNextSpace} pour accéder à l\'élément sélectionnable inatteignable le plus proche avant le curseur, par exemple : deux lignes horizontales adjacentes. Répéter la combinaison de touches pour atteindre les éléments sélectionnables précédents.'
		},
			{
			name: 'Commande d\'accès à l\'élément sélectionnable suivant',
			legend: 'Appuyer sur ${accessNextSpace} pour accéder à l\'élément sélectionnable inatteignable le plus proche après le curseur, par exemple : deux lignes horizontales adjacentes. Répéter la combinaison de touches pour atteindre les éléments sélectionnables suivants.'
		},
			{
			name: ' Aide sur l\'accessibilité',
			legend: 'Appuyer sur ${a11yHelp}'
		}
		]
	}
	],
	backspace: 'Retour arrière',
	tab: 'Tabulation',
	enter: 'Entrée',
	shift: 'Majuscule',
	ctrl: 'Ctrl',
	alt: 'Alt',
	pause: 'Pause',
	capslock: 'Verr. Maj.',
	escape: 'Échap',
	pageUp: 'Page supérieure',
	pageDown: 'Page suivante',
	end: 'Fin',
	home: 'Origine',
	leftArrow: 'Flèche gauche',
	upArrow: 'Flèche haut',
	rightArrow: 'Flèche droite',
	downArrow: 'Flèche basse',
	insert: 'Inser',
	'delete': 'Supprimer',
	leftWindowKey: 'Touche Windows gauche',
	rightWindowKey: 'Touche Windows droite',
	selectKey: 'Touche Sélectionner',
	numpad0: '0 du pavé numérique',
	numpad1: '1 du pavé numérique',
	numpad2: '2 du pavé numérique',
	numpad3: '3 du pavé numérique',
	numpad4: '4 du pavé numérique',
	numpad5: '5 du pavé numérique',
	numpad6: '6 du pavé numérique',
	numpad7: '7 du pavé numérique',
	numpad8: 'Pavé numérique 8',
	numpad9: '9 du pavé numérique',
	multiply: 'Multiplier',
	add: 'Plus',
	subtract: 'Moins',
	decimalPoint: 'Point décimal',
	divide: 'Diviser',
	f1: 'F1',
	f2: 'F2',
	f3: 'F3',
	f4: 'F4',
	f5: 'F5',
	f6: 'F6',
	f7: 'F7',
	f8: 'F8',
	f9: 'F9',
	f10: 'F10',
	f11: 'F11',
	f12: 'F12',
	numLock: 'Verr. Num.',
	scrollLock: 'Arrêt défil.',
	semiColon: 'Point-virgule',
	equalSign: 'Signe égal',
	comma: 'Virgule',
	dash: 'Tiret',
	period: 'Point',
	forwardSlash: 'Barre oblique',
	graveAccent: 'Accent grave',
	openBracket: 'Parenthèse ouvrante',
	backSlash: 'Barre oblique inverse',
	closeBracket: 'Parenthèse fermante',
	singleQuote: 'Apostrophe'
} );
