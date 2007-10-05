/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync javascript
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @since      File available since Release 2.6.0
*/


function toggleStatus() {
    showHide('update_details','update_details_img','img/minus.gif','img/plus.gif');
    document.linker.StatusHidden.value=(document.linker.StatusHidden.value=='OFF'?'ON':'OFF');
}

function doUpdateStatus(result) {

    if ( result.hasChildNodes() ) {

        var resultChild = result.firstChild;
        var doReload = false;
        var reloadTime = 0;
        var safty1 = 0;  // just in case we produce a loop somehow

        while ( resultChild != null ) {

            var resultChildName = resultChild.nodeName;
            var resultChildType = resultChild.getAttribute('type');

            switch ( resultChildType ) {

                case 'text' :
                    var newElement;

                    if ( resultChild.childNodes.length != 0 ){
                        var newText = decode(resultChild.firstChild.data);
                        newElement = document.createTextNode(newText);
                    } else {
                        newElement = document.createTextNode('');
                    }
                    var docElement = document.getElementById(resultChildName);
                    if ( docElement != null ) {
                        docElement.replaceChild(newElement, docElement.firstChild);
                    }
                    break;

                case 'image' :
                    var newElement;
                    var newImage = resultChild.getAttribute('src');
                    var isCharLog = resultChild.getAttribute('isCharLog');
                    var isMemberlistLog = resultChild.getAttribute('isMemberlistLog');

                    if ( newImage != null ){
                        newImage = decode(newImage);
                        newElement = document.createElement("img");
                        newElement.setAttribute( 'src', newImage );
                    } else {
                        newElement = document.createElement("img");
                    }
                    if ( isCharLog != null || isMemberlistLog != null ) {
                        var overlibChild = resultChild.firstChild;
                        var overlibData = '';
                        var safty2 = 0; // just in case we produce a loop somehow
                        while ( overlibChild != null ) {
                            overlibData += overlibChild.firstChild.data;
                            overlibChild = overlibChild.nextSibling;
                            if ( safty2++ > 50 ) break; // just in case we produce a loop somehow
                        }
                        overlibData = decode(overlibData);

                        if ( isCharLog != null ) {
                            newElement.onmouseover = function() {
                                return overlib(overlibData,CAPTION,'Update Log',WRAP);
                            }
                            newElement.onmouseout = function() { return nd(); }
                        }
                        if ( isMemberlistLog != null ) {
                            newElement.onclick = function() {
                                return overlib('<div style="height:300px;width:500px;overflow:auto;">'+ overlibData+ '</div>',CAPTION,'Update Log',STICKY, OFFSETX, 250, CLOSECLICK);
                            }
                            newElement.onmouseover = function() {
                                return overlib('Click me',CAPTION,'Update Log',WRAP);
                            }
                            newElement.onmouseout = function() { return nd(); }
                        }
                    }
                    var docElement = document.getElementById(resultChildName);
                    if ( docElement != null ) {
                        docElement.replaceChild(newElement, docElement.firstChild);
                    }
                    break;

                case 'bar' :
                    var perc = resultChild.getAttribute('perc');
                    var perc_left = resultChild.getAttribute('perc_left');

                    if ( perc != null && perc_left != null ) {
                        var progBar = document.getElementById('progress_bar');
                        if ( progBar != null ) {
                            while ( progBar.hasChildNodes() ) {
                                var firstChild = progBar.firstChild
                                progBar.removeChild(firstChild);
                            }

                            if ( perc && perc != 0 ) {
                                var newTD = document.createElement("td");
                                newTD.setAttribute('bgColor', '#660000');
                                newTD.setAttribute('height', '12px');
                                newTD.setAttribute('width', perc+'%');
                                progBar.appendChild(newTD);
                            }

                            if ( perc_left && perc_left != 0 ) {
                                var newTD = document.createElement("td");
                                newTD.setAttribute('bgColor', '#FFF7CE');
                                newTD.setAttribute('height', '12px');
                                newTD.setAttribute('width', perc_left+'%');
                                progBar.appendChild(newTD);
                            }
                        }
                    }
                    break;

                case 'control' :
                    var reloadTime = resultChild.getAttribute('reloadTime');

                    if ( reloadTime != null ) {
                        doReload = true;
                    }
                    break;
            }

            resultChild = resultChild.nextSibling;

            if ( safty1++ > 15 ) break; // just in case we produce a loop somehow
        }

        if ( doReload == true ) {
            self.setTimeout('nextStep()', reloadTime);
        }
    }
}

function decode(text) {
    return decode_utf8(URLDecode(text));
}


//
// Just in case we need that someone
//
//function URLEncode(plaintext)
//{
//	// The Javascript escape and unescape functions do not correspond
//	// with what browsers actually do...
//	var SAFECHARS = "0123456789" +					// Numeric
//					"ABCDEFGHIJKLMNOPQRSTUVWXYZ" +	// Alphabetic
//					"abcdefghijklmnopqrstuvwxyz" +
//					"-_.!~*'()";					// RFC2396 Mark characters
//	var HEX = "0123456789ABCDEF";
//
//	var encoded = "";
//	for (var i = 0; i < plaintext.length; i++ ) {
//		var ch = plaintext.charAt(i);
//	    if (ch == " ") {
//		    encoded += "+";				// x-www-urlencoded, rather than %20
//		} else if (SAFECHARS.indexOf(ch) != -1) {
//		    encoded += ch;
//		} else {
//		    var charCode = ch.charCodeAt(0);
//			if (charCode > 255) {
//			    alert( "Unicode Character '"
//                        + ch
//                        + "' cannot be encoded using standard URL encoding.\n" +
//				          "(URL encoding only supports 8-bit characters.)\n" +
//						  "A space (+) will be substituted." );
//				encoded += "+";
//			} else {
//				encoded += "%";
//				encoded += HEX.charAt((charCode >> 4) & 0xF);
//				encoded += HEX.charAt(charCode & 0xF);
//			}
//		}
//	} // for
//
//	return encoded;
//};

function URLDecode(encoded)
{
   // Replace + with ' '
   // Replace %xx with equivalent character
   // Put [ERROR] in output if %xx is invalid.
   var HEXCHARS = "0123456789ABCDEFabcdef";
   var plaintext = "";
   var i = 0;
   while (i < encoded.length) {
       var ch = encoded.charAt(i);
	   if (ch == "+") {
	       plaintext += " ";
		   i++;
	   } else if (ch == "%") {
			if (i < (encoded.length-2)
					&& HEXCHARS.indexOf(encoded.charAt(i+1)) != -1
					&& HEXCHARS.indexOf(encoded.charAt(i+2)) != -1 ) {
				plaintext += unescape( encoded.substr(i,3) );
				i += 3;
			} else {
				//alert( 'Bad escape combination near ...' + encoded.substr(i) );
				plaintext += "%[ERROR]";
				i++;
			}
		} else {
		   plaintext += ch;
		   i++;
		}
	} // while
   return plaintext;
};

//
// Just in case we need that someone
//
//function encode_utf8(rohtext) {
//     // dient der Normalisierung des Zeilenumbruchs
//     rohtext = rohtext.replace(/\r\n/g,"\n");
//     var utftext = "";
//     for(var n=0; n<rohtext.length; n++)
//         {
//         // ermitteln des Unicodes des  aktuellen Zeichens
//         var c=rohtext.charCodeAt(n);
//         // alle Zeichen von 0-127 => 1byte
//         if (c<128)
//             utftext += String.fromCharCode(c);
//         // alle Zeichen von 127 bis 2047 => 2byte
//         else if((c>127) && (c<2048)) {
//             utftext += String.fromCharCode((c>>6)|192);
//             utftext += String.fromCharCode((c&63)|128);}
//         // alle Zeichen von 2048 bis 66536 => 3byte
//         else {
//             utftext += String.fromCharCode((c>>12)|224);
//             utftext += String.fromCharCode(((c>>6)&63)|128);
//             utftext += String.fromCharCode((c&63)|128);}
//         }
//     return utftext;
//}

function decode_utf8(utftext) {
     var plaintext = ""; var i=0; var c=c1=c2=0;
     // while-Schleife, weil einige Zeichen uebersprungen werden
     while(i<utftext.length)
         {
         c = utftext.charCodeAt(i);
         if (c<128) {
             plaintext += String.fromCharCode(c);
             i++;}
         else if((c>191) && (c<224)) {
             c2 = utftext.charCodeAt(i+1);
             plaintext += String.fromCharCode(((c&31)<<6) | (c2&63));
             i+=2;}
         else {
             c2 = utftext.charCodeAt(i+1); c3 = utftext.charCodeAt(i+2);
             plaintext += String.fromCharCode(((c&15)<<12) | ((c2&63)<<6) | (c3&63));
             i+=3;}
         }
     return plaintext;
}
