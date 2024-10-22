//Kiem tra n co phai la so nguyen to khong
#include <iostream>
using namespace std;

bool laNT(int n){
	if(n<2) return false;
	for(int i = 2; i<n; i++)
		if(n%i==0) return false;	
	return true;
}

int main(){
//	int n;
//	cin>>n;
//	int dem = 0;
//	for(int i = 1; i<=(n/2); i++){
//		if(n%i==0) {
//			cout<<i<<",";
//			dem++;
//		}
//	}
//	if(dem==1) cout<<n<<" la so nguyen to!";
//	else cout<<n<<" khong phai la so nguyen to!";
//	
//	return 0;

	int n;
	cin>>n;
	if(laNT(n)) 
		cout<<"La so nguyen to";
	else
		cout<<"Khong phai so nguyen to";
		
	return 0;
}

