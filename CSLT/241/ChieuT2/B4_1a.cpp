//4.1.a Tinh tong cac chu so cua tung so trong mang
#include <iostream>
using namespace std;
#define maxn 10000

void nhapmang(int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	cout<<"Nhap "<<n<<" phan tu cua mang:";
	for(int i = 0; i<n; i++){
		cin>>a[i];
	}
	return;
}
void xuatmang(int a[], int n){
	cout<<"Mang vua nhap la:";
	for(int i=0; i<n; i++){
		cout<<a[i]<<", ";
	}
}

int tongcacchuso(int x){
	int tong = 0;
	while(x>0){
		tong+=(x%10);
		x/=10;
	}
	return tong;
}

int main(){
	int a[maxn], n;
	nhapmang(a, n);	
	xuatmang(a, n);
	int tongchuso = 0;
	cout<<"\nTong cac chu so cua tung so trong mang:";
	for(int i=0; i<n; i++){
		cout<<tongcacchuso(a[i])<<" ";
		tongchuso+=tongcacchuso(a[i]);
	}
	
	cout<<"\nTong cac chu so cua tat ca cac so trong mang: "<<tongchuso;
	return 0;
}
