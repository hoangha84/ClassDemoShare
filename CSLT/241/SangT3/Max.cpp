//Tim max a, b, c dung ternary operator
#include <iostream>
using namespace std;

int main (){	
	int a, b, c, max;
	cout<<"Nhap a,b,c:";
	cin>>a>>b>>c;
	
	//Max cua 3 so la so lon hon 2 so con lai
//	if(a>=b && a>=c) max = a;
//	if(b>=a && b>=c) max = b;
//	if(c>=a && c>=b) max = c;
	
	//Dung ternary operator, so sanh tung bien gia tri
//	max = a;
//	max = (max<b) ? b : max;
//	max = (max<c) ? c : max;
	
	//Tim max theo nhanh dieu kien
//	if(a>b){
//		if(a>c){
//			max = a;
//		} else { //c>=a va a>b
//			max = c;
//		}		
//	} else { //b>=a
//		if(b>c){
//			max = b;
//		} else { //c>=b va b>=a
//			max = c;
//		}
//	}
//	if(a>b)
//		if(a>c)	max = a;
//		else max = c; //c>=a va a>b			
//	else //b>=a
//		if(b>c)	max = b;
//		else max = c; //c>=b va b>=a
	
	//Dung ternary
	max = (a>b) ? ((a>c) ? a : c) : ((b>c) ? b : c);
	
	cout<<"Max:"<<max;	
	return 0;
}
