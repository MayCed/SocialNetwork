<?php 

chiffres = [14 , 12 , 5 ,-2 , 0 ];


for (i=0, i <chiffres.length-1,i++){
	for(y=i+1,y<chiffres.length,y++){
		tampon;
		if(chiffres[i]>chiffres[y]){
			tampon= chiffres[y];
			chiffres[y]=chiffres[i];
			chiffres[i]=tampon;
		}
	}
}

for(i=0, i <chiffres.length,i++){
	echo chiffres[i];
}
