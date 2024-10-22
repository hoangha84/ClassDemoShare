//Kiem tra n co phai la so hoan thien. 
//So hoan thien la so co tong cac uoc (khong tinh chinh no) = chinh no
#include <iostream>
using namespace std;

int main(){
	int n;
	cin>>n;
	int tong = 0;
	for(int i =1; i<=(n/2); i++){
		if(n%i==0) {
			tong+=i;
			cout<<i<<" + ";
		}
	}
	
	if(n==tong) cout<<"\nSo hoan thien";
	else cout<<"\nKhong phai so hoan thien";
	return 0;
}
