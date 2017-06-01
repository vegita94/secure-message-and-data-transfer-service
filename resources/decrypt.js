
function xor(a,b)
{

	var xor_value="";
	var temp="";
	var length=a.length;
	for(i=0;i<length;i++)

	{

		temp=(a.charAt(i))^(b.charAt(i));
		//document.write(temp);
		xor_value=xor_value.concat(temp);
		temp="";

	}
	return xor_value;
}


function dec2bin(dec){
    x = parseInt(dec);
	var bin = x.toString(2);
	var real="";
	//document.write(bin);
	if(bin.length<4)
	{
		var temp="";
		var diff=4-bin.length;
		for(j=0;j<diff;j++)
		{
			temp=temp.concat("0");
		}
		 real=temp.concat(bin);
	}
	else
	{
		real=bin;
	}
	return real;
}


//this is the main processing function
function processor(element1,element2)
{

	var ebit=[
				 				 32,     1,    2,     3,     4,    5,
                  4,     5,    6,     7,     8,    9,
                  8,     9,   10,    11,    12,   13,
                 12,    13,   14,    15,    16,   17,
                 16,    17,   18,    19,    20,   21,
                 20,    21,   22,    23,    24,   25,
                 24,    25,   26,    27,    28,   29,
                 28,    29,   30,    31,    32,    1
				];

	element1_length=element1.length;
	//shuffling the value
	var ebit_final="";

	for(i=0;i<48;i++)
	{
		ebit_final=ebit_final.concat(element1.charAt(ebit[i]-1));
	}

	//ebit_final store the extended R value
	var xor_value=xor(ebit_final,element2);
	//document.write("XOR Value=>"+xor_value);

	//now separation xor value in 8 parts
	var B=[];
	var p=1;
	for(i=1;i<=48;i=i+6)
	{

		B[p]=xor_value.substring(i-1,i+5);
		//document.write("<br>");

		p++;
	}





   //processing SBOX
   var sbox_binary="";
   for(i=1;i<9;i++)
 	{
 		//document.write(sboxprocess(B[i],i));

 		sbox_binary=sbox_binary.concat(sboxprocess(B[i],i));

 		//document.write("<br>");
 	}
 	//document.write("J"+sbox_binary+"J");
	var p=[
						 						 16,   7,  20,  21,
                         29,  12,  28,  17,
                          1,  15,  23,  26,
                          5,  18,  31,  10,
                          2,   8,  24,  14,
                         32,  27,   3,   9,
                         19,  13,  30,   6,
                         22,  11,   4,  25
		];
var p_binary="";
for(i=0;i<32;i++)
{
	p_binary=p_binary.concat(sbox_binary.charAt(p[i]-1));
}
	//document.write("P Binary=>"+p_binary);
	return p_binary;




}



function sboxprocess(B,i)
{
	//now starting with the SBOX Job
	//declearing SBox variable
	//document.write(B);
	var array;
	var s1=[
			 [ 14,  4,  13,  1,   2, 15,  11,  8,   3, 10,   6, 12,   5,  9,   0,  7 ],
  			 [  0, 15,   7,  4,  14,  2,  13,  1,  10,  6,  12, 11,   9,  5,   3,  8 ],
  			 [  4,  1,  14,  8,  13,  6,   2, 11,  15, 12,   9,  7,   3, 10,   5,  0 ],
  			 [ 15, 12,   8,  2,   4,  9,   1,  7,   5, 11,   3, 14,  10,  0,   6, 13 ]

			];
	var s2=[
			 [ 15,   1,   8, 14,   6, 11,   3,  4,   9,  7,   2, 13,  12,  0,   5, 10 ],
      		 [  3,  13,   4,  7,  15,  2,   8, 14,  12,  0,   1, 10,   6,  9,  11,  5 ],
      		 [  0,  14,   7, 11,  10,  4,  13,  1,   5,  8,  12,  6,   9,  3,   2, 15 ],
     		 [ 13,   8,  10,  1,   3, 15,   4,  2,  11,  6,   7, 12,   0,  5,  14,  9 ]
			];
	var s3=[
			 [ 10,  0,   9, 14,   6,  3,  15,  5,   1, 13,  12,  7,  11,  4,   2,  8 ],
     		 [ 13,  7,   0,  9,   3,  4,   6, 10,   2,  8,   5, 14,  12, 11,  15,  1 ],
     		 [ 13,  6,   4,  9,   8, 15,   3,  0,  11,  1,   2, 12,   5, 10,  14,  7 ],
      		 [  1, 10,  13,  0,   6,  9,   8,  7,   4, 15,  14,  3,  11,  5,   2, 12 ]
			];
	var s4=[

    			 [  7, 13,  14,  3,   0,  6,   9, 10,   1,  2,   8,  5,  11, 12,   4, 15 ],
     		   	 [ 13,  8,  11,  5,   6, 15,   0,  3,   4,  7,   2, 12,   1, 10,  14,  9 ],
     			 [ 10,  6,   9,  0,  12, 11,   7, 13,  15,  1,   3, 14,   5,  2,   8,  4 ],
      			 [  3, 15,   0,  6,  10,  1,  13,  8,   9,  4,   5, 11,  12,  7,   2, 14 ]
			];

	var s5=[

      	   [ 2, 12,   4,  1,   7, 10,  11,  6,   8,  5,   3, 15,  13,  0,  14,  9 ],
     	   [14, 11,   2, 12,   4,  7,  13,  1,   5,  0,  15, 10,   3,  9,   8,  6 ],
      	   [ 4,  2,   1, 11,  10, 13,   7,  8,  15,  9,  12,  5,   6,  3,   0, 14 ],
     	   [11,  8,  12,  7,   1, 14,   2, 13,   6, 15,   0,  9,  10,  4,   5,  3 ]

			];

	var s6=[
			 [ 12,  1,  10, 15,   9,  2,   6,  8,   0, 13,   3,  4,  14,  7,   5, 11 ],
     		 [ 10, 15,   4,  2,   7, 12,   9,  5,   6,  1,  13, 14,   0, 11,   3,  8 ],
      		 [  9, 14,  15,  5,   2,  8,  12,  3,   7,  0,   4, 10,   1, 13,  11,  6 ],
     		 [  4,  3,   2, 12,   9,  5,  15, 10,  11, 14,   1,  7,   6,  0,   8, 13 ]
			];

	var s7=[

     		[  4, 11,   2, 14,  15,  0,   8, 13,   3, 12,   9,  7,   5, 10,   6,  1 ],
     		[ 13,  0,  11,  7,   4,  9,   1, 10,  14,  3,   5, 12,   2, 15,   8,  6 ],
      		[  1,  4,  11, 13,  12,  3,   7, 14,  10, 15,   6,  8,   0,  5,   9,  2 ],
      		[  6, 11,  13,  8,   1,  4,  10,  7,   9,  5,   0, 15,  14,  2,   3, 12 ]
		  ];

    var s8=[
    		 [ 13,  2,   8,  4,   6, 15,  11,  1,  10,  9,   3, 14,   5,  0,  12,  7 ],
      		 [  1, 15,  13,  8,  10,  3,   7,  4,  12,  5,   6, 11,   0, 14,   9,  2 ],
             [  7, 11,   4,  1,   9, 12,  14,  2,   0,  6,  10, 13,  15,  3,   5,  8 ],
             [  2,  1,  14,  7,   4, 10,   8, 13,  15, 12,   9,  0,   3,  5,   6, 11 ]
    	   ];

	if(i==1)
	{
		array=s1;
	}
	else if(i==2)
	{
		array=s2;
	}
	else if(i==3)
	{
		array=s3;
	}
	else if(i==4)
	{
		array=s4;
	}
	else if(i==5)
	{
		array=s5;
	}
	else if(i==6)
	{
		array=s6;
	}
	else if(i==7)
	{
		array=s7;
	}
	else if(i==8)
	{
		array=s8;
	}

var temp1=B.charAt(0);
var temp2=B.charAt(5);
var row_binary=temp1.concat(temp2);
var column_binary=B.substring(1,5);

//converting row and column binary value to decimal
var row_decimal=parseInt(row_binary,2);
var column_decimal=parseInt(column_binary,2);

// selecting value from sbox
var box_value_decimal=array[row_decimal][column_decimal];

var box_value_binary=dec2bin(box_value_decimal);

//document.write(box_value_binary);
//document.write("<br>");
return box_value_binary;

}


function hello1(message,key){

	//alert(message+" "+key);
	//var key="ABCDEF0123456789";
//document.write(key);
//declaring ascii value of each character
var lookupTable = {
        '0': '0000', '1': '0001', '2': '0010', '3': '0011', '4': '0100',
        '5': '0101', '6': '0110', '7': '0111', '8': '1000', '9': '1001',
        'a': '1010', 'b': '1011', 'c': '1100', 'd': '1101',
        'e': '1110', 'f': '1111',
        'A': '1010', 'B': '1011', 'C': '1100', 'D': '1101',
        'E': '1110', 'F': '1111'
    };
 var lookupTable1= {
        '0000': '0', '0001': '1', '0010': '2', '0011': '3', '0100': '4',
        '0101': '5', '0110': '6', '0111': '7', '1000': '8', '1001': '9',
        '1010': 'a', '1011': 'b', '1100': 'c', '1101': 'd',
        '1110': 'e', '1111': 'f',
        '1010': 'A', '1011': 'B', '1100': 'C', '1101': 'D',
        '1110': 'E', '1111': 'F'
    };

var key_length=key.length;
var key_binary="";
var o="F";
//document.write(lookupTable[o]);


//converting hexadecimal value into binary
for(i=0;i<key_length;i++)
{
	var char=key.charAt(i);
	key_binary=key_binary.concat(lookupTable[char]);
}



// now permuting the 64 bit value

var pc1=	   [57,  49,    41,   33,    25,    17,    9,
               1,   58,    50,   42,    34,    26,   18,
              10,    2,    59,   51,    43,    35,   27,
              19,   11,     3,   60,    52,    44,   36,
              63,   55,    47,   39,    31,    23,   15,
               7,   62,    54,   46,    38,    30,   22,
              14,    6,    61,   53,    45,    37,   29,
              21,   13,     5,   28,    20,    12,    4];

var key_binary_plus="";

// shuffling the value according to the pc1 table
for(i=0;i<56;i++)
{
	key_binary_plus=key_binary_plus.concat(key_binary.charAt(pc1[i]-1));
}

var c=[];
var d=[];

// dividing the 56bit value into 28 bit and 28 bit
c[0]=key_binary_plus.substring(0,28);
d[0]=key_binary_plus.substring(28,56);

//this is shift table by which we are shifting
var shift=[0,1,1,2,2,2,2,2,2,1,2,2,2,2,2,2,1];

//shifting in process
for(i=1;i<=16;i++)
{
	var cut1=c[i-1].substring(0,shift[i]);
	var cut2=c[i-1].substring(shift[i],28);
	c[i]=cut2.concat(cut1);



	var cut3=d[i-1].substring(0,shift[i]);
	var cut4=d[i-1].substring(shift[i],28);
	d[i]=cut4.concat(cut3);



}

var cd=[];
// new shifiting value joining in process
for(i=1;i<=16;i++)
{
	cd[i]=c[i].concat(d[i]);
}


// permuted table 2
var pc2=
			  	[14,    17,   11,    24,     1,    5,
                  3,    28,   15,     6,    21,   10,
                 23,    19,   12,     4,    26,    8,
                 16,     7,   27,    20,    13,    2,
                 41,    52,   31,    37,    47,   55,
                 30,    40,   51,    45,    33,   48,
                 44,    49,   39,    56,    34,   53,
                 46,    42,   50,    36,    29,   32 ];

var key_ready=[];
var temp="";


//shuffling permuted value
for(i=1;i<=16;i++)
{
	for(j=0;j<48;j++)
	{
		temp=temp.concat(cd[i].charAt(pc2[j]-1));
	}
	key_ready[i]=temp;
	temp="";
}

//document.write("Key Generation Successfull");
//document.getElementById("heading").innerHTML = "Key Generation Successfull";
//document.write("<br>");
for(i=1;i<=16;i++)
{

//document.write("K");
//document.write(i);
//document.write("=>");
//document.write(key_ready[i]);
//document.write("<br>");
}

//***************************************************** KEY GENERATION COMPLETED ***************************************/

//************************ STARTING MESSAGE PROCESSING *******************************

//user message in hexa form

//var message="A0123456B789CDEF";
var mes_length=message.length;
var part=mes_length/16;
var b,k=0;
var decrypted_hex="";
for(b=0;b<part;b++)
{
	var temp_string=message.substring(k,k+16);
	//main(key_ready,)
	k=k+16;
	decrypted_hex=decrypted_hex.concat(main(key_ready,temp_string));
	//console.log(key_ready[15]);
}
//console.log(decrypted_hex);

//doing final move from hex value to sentences
var partting=decrypted_hex.length;
partting=partting/2;
var v,k=0;
var final_message="";
var char = String.fromCharCode;
for(v=0;v<partting;v++)
{
	var temp_sen=decrypted_hex.substring(v*2,k+2);
	k=k+2;
	var t="0x".concat(temp_sen);
	final_message=final_message.concat(char(t));
	//console.log(temp_sen);
}
return final_message;

function main(key_ready,message)
{



var message_length=message.length;





//console.log("message:"+message);
//converting user message into binary
var message_binary="";
for(i=0;i<message_length;i++)
{
	var char=message.charAt(i);
	message_binary=message_binary.concat(lookupTable[char]);
}
//document.write("Binary value of original message =>");
//document.write(message_binary);

var ip=[
			58,    50,   42,    34,    26,   18,    10,    2,
            60,    52,   44,    36,    28,   20,    12,    4,
            62,    54,   46,    38,    30,   22,    14,    6,
            64,    56,   48,    40,    32,   24,    16,    8,
            57,    49,   41,    33,    25,   17,     9,    1,
            59,    51,   43,    35,    27,   19,    11,    3,
            61,    53,   45,    37,    29,   21,    13,    5,
            63,    55,   47,    39,    31,   23,    15,    7
		];

//doing initital permutation
var ip_value="";
for(i=0;i<64;i++)
{
	ip_value=ip_value.concat(message_binary.charAt(ip[i]-1));
}

//document.write("<br>");
//document.write("IP Value =>");
//document.write(ip_value);

//Next divide the permuted block IP into a left half L0 of 32 bits, and a right half R0 of 32 bits

var L=[];
var R=[];

L[0]=ip_value.substring(0,32);
R[0]=ip_value.substring(32,64);


//We now proceed through 16 iterations, for 1<=n<=16,
//using a function f which operates on two blocks--a data block of 32 bits
//and a key Kn of 48 bits--to produce a block of 32 bits

	//for(i=1;i<=1;i++)
	//{
		//L[i]=R[i-1];
		//R[i]=L[i-1]+f(R[i-1],k[i]);

	//}

var checkR="11110000101010101111000010101010";
var checkK="000110110000001011101111111111000111000001110010";

//function for doing xor operation



// this function convert decimal to binary







//document.write("<br>");
//For Decrypting we need to use the keys in reverse order
//so x=16 helps us to use the last key in the first round
//and then we keep subtracting one from x each round
var x=16;
for(m=1;m<=16;m++)
	{
		L[m]=R[m-1];
		var fun_return=processor(R[m-1],key_ready[x]);
		//document.write(fun_return);
		var xor1=xor(L[m-1],fun_return);
		R[m]=xor1;
		x--;
	}

var final=R[16].concat(L[16]);
//1 document.write("Final R[16]L[16]==>"+final);
//obj["final"]=final;

//finishing
var ip1=[

            40,     8,   48,    16,    56,   24,    64,   32,
            39,     7,   47,    15,    55,   23,    63,   31,
            38,     6,   46,    14,    54,   22,    62,   30,
            37,     5,   45,    13,    53,   21,    61,   29,
            36,     4,   44,    12,    52,   20,    60,   28,
            35,     3,   43,    11,    51,   19,    59,   27,
            34,     2,   42,    10,    50,   18,    58,   26,
            33,     1,   41,     9,    49,   17,    57,   25
		];

var decrypt_binary="";
for(i=0;i<64;i++)
{
	decrypt_binary=decrypt_binary.concat(final.charAt(ip1[i]-1));
}

//2 document.write("<br>");
//3 document.write("decrypt_binary"+decrypt_binary);
//obj["decrypt_binary"]=decrypt_binary;
var final_hexa="";
for(i=0;i<64;i=i+4)
{
	//document.write("<br>");
	//document.write(decrypt_binary.substring(i,i+4));
	final_hexa=final_hexa.concat(lookupTable1[decrypt_binary.substring(i,i+4)]);

}

//4 document.write("<br>");
//5 document.write("Decrypted => "+final_hexa);
//console.log(final_hexa);


//obj["final_hexa"]=final_hexa;
return final_hexa;
}

}


function modalActivate(n){
				var modal = document.getElementById('modal');
				var modalElement = document.getElementsByClassName('modalContent');
				modal.style.display = "block";
				modalElement[n].style.display = "block";
				window.onclick = function(event){
					if(event.target == modal)
					{
						modal.style.display = "none";
						modalElement[n].style.display = "none";
					}
				}
			}
		//Start Your Code From This start method..
function start(){
	//alert('hello');
	//if you want to display something on modalbox use this.
	/*	var heading = "My heading";
		var para = "Its a test";
		document.getElementById("heading").innerHTML = heading;
		document.getElementById("para").innerHTML = para;
	*/
	//alert("YEs");
	var obj = {};
	hello(obj);
	//alert(obj["final_hexa"]+" "+obj["decrypt_binary"]+" "+obj["final"]);
	//document.getElementById("para3").innerHTML=obj["final_hexa"];
	//document.getElementById("para2").innerHTML=obj["decrypt_binary"];
	//document.getElementById("para1").innerHTML=obj["final"];
	//document.getElementById("heading").innerHTML = "Decryption Successfull";

	//modalActivate(0);
	return false;
}
