/***********************************************
* Omni Slide Menu script - © John Davenport Scheuer
* very freely adapted from Dynamic-FX Slide-In Menu (v 6.5) script- by maXimus
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full original source code
* as first mentioned in http://www.dynamicdrive.com/forums
* username:jscheuer1
***********************************************/

//One global variable to set, use true if you want the menus to reinit when the user changes text size (recommended):
resizereinit=true;

menu[3] = {
id:'menu3', //use unique quoted id (quoted) REQUIRED!!

d_colspan:3,     // Available columns in menu body as integer
allowtransparent:false, // true to allow page to show through menu if other bg's are transparent or border has gaps
barwidth:20,     // bar (the vertical cell) width
wrapbar:true,    // extend and wrap bar below menu for a more solid look (default false) - will revert to false for top menu
hdingwidth:150,  // heading - non linked horizontal cells width
hdingheight:25,  // heading - non linked horizontal cells height
hdingindent:0,   // heading - non linked horizontal cells text-indent represents ex units (@8 pixels decimals allowed)
linkheight:30,   // linked horizontal cells height
linktopad:3,     // linked horizontal cells top padding
borderwidth:0,   // inner border-width used for this menu

/////////////////////////// quote these properties: /////////////////////
bordercolor:'white', // inner border color
borderstyle:'solid',    // inner border style (solid, dashed, inset, etc.)
outbrdwidth:'0ex 0ex 0ex 0ex', // outer border-width used for this menu (top right bottom left)
outbrdcolor:'lightblue',  // outer border color
outbrdstyle:'solid',     // outer border style (solid, dashed, inset, etc.)
barcolor:'white',        // bar (the vertical cell) text color
barbgcolor:'purple',   // bar (the vertical cell) background color
barfontweight:'',    // bar (the vertical cell) font weight
baralign:'center',       // bar (the vertical cell) right left or center text alignment
menufont:'verdana',      // menu font
fontsize:'80%',          // express as percentage with the % sign
hdingcolor:'black',      // heading - non linked horizontal cells text color
hdingbgcolor:'white',  // heading - non linked horizontal cells background color
hdingfontweight:'bold',  // heading - non linked horizontal cells font weight
hdingvalign:'middle',    // heading - non linked horizontal cells vertical align (top, middle or center)
hdingtxtalign:'left',    // heading - non linked horizontal cells right left or center text alignment
linktxtalign:'left',     // linked horizontal cells right left or center text alignment
linktarget:'',           // default link target, leave blank for same window (other choices: _new, _top, or a window or frame name)

bartext:'Hubungi Kami',
menupos:'right',
kviewtype:'fixed', 
menuItems:[ // REQUIRED!!
//[name, link, target, colspan, endrow?] - leave 'link' and 'target' blank to make a header
["Hubungi Kami Via :"], //create header
["<b>Yahoo Messenger</b>", "",""],
["<img src='http://opi.yahoo.com/online?u=tessaputra&m=g&t=1' border='0' style='margin-bottom:5px; margin-right:1px;'/><br> ", "ymsgr:sendIM?tessaputra", "", 1, "no"], //create two column row, requires d_colspan:2 (the default)
["<img src='http://opi.yahoo.com/online?u=cs2_nusaelektronik&m=g&t=1' border='0' style='margin-bottom:5px; margin-right:1px;' /><br>", "ymsgr:sendIM?cs2_nusaelektronik", "",1],

["<b>WhatsApp</b> : 087772325770", "",""],
["<b>PIN BBM</b> :  2657BA32", "", ""],
["Email CS 1", "mailto:Tessaputra@yahoo.co.id", ""],
["Email cS 2", "mailto:cs2@nusaelektronik.com", ""],
["<b>Office</b><br>   087772325770", "", ""],



// ["External Links", "", ""], //create header
// ["JavaScript Kit", "http://www.javascriptkit.com", "_new"],
// ["Freewarejava", "http://www.freewarejava.com", "_new"],
// ["Coding Forums", "http://www.codingforums.com", "_new"]  //no comma after last entry


]}; // REQUIRED!! do not edit or remove

////////////////////Stop Editing/////////////////

make_menus();