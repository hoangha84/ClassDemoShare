//So Amstrong
#include <iostream>
#include <cmath>
using namespace std;

int SoKiTu(int n){
	int dem = 0;
	while(n>0){
		dem++;
		n/=10;
	}
	return dem;	
}

int main(){
	int n;
	cin>>n;
	int kt = SoKiTu(n);
	int tong = 0;
	int tam = n;
	while (tam>0){
		tong += pow(tam%10,kt);
		tam/=10;
	}
	if(n==tong)
		cout<<n<<" la so Amstrong";
	else
		cout<<n<<" khong phai la so Amstrong";
//	cout<<"So ki tu cua "<<n<<" la: "<<SoKiTu(n);
//	cout<<"Tong: "<<tong;
	
	return 0;
}
