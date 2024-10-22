//Nhap 4 so, in ra day tang dan
#include <iostream>
using namespace std;

int main(){
	int a,b,c,d;
	cin>>a>>b>>c>>d;
	//Ke thua gia tri min max da co
//	int max, min;
//	cin>>a>>b>>c>>d;
//	max=min=a;
//	if(max<b) max = b;
//	if(max<c) max = c;
//	if(max<d) max = d;
//	
//	if(min>b) min = b;
//	if(min>c) min = c;
//	if(min>d) min = d;
//	
//	cout<<"Day tang dan la:";
//	for(int i = min; i<max; i++){
//		if(i==a || i==b || i==c || i==d)
//			cout<<i<<",";
//	}
//	cout<<max<<".";
	//-----------------------------------------
	if(a>b) swap(a,b);
	if(a>c) swap(a,c);
	if(a>d) swap(a,d);
	
	if(b>c) swap(b,c);
	if(b>d) swap(b,d);
	
	if(c>d) swap(c,d);
	
	cout<<a<<" "<<b<<" "<<c<<" "<<d;
	
	int dmin = b-a;
	if(dmin>(c-b)) dmin = c-b;
	if(dmin>(d-c)) dmin = d-c;
	cout<<"\nKhoang cach gan nhat:"<<dmin;
	
	return 0;
}
