//Ktra so hoan chinh
#include <iostream>
using namespace std;

int main(){
	int n;
	cin>>n;
	int tong = 0;
	for(int i = 1; i<n; i++){
		if(n%i==0) tong+=i;
	}
	if(tong==n) cout<<n<<" la so hoan thien";
	else cout<<n<<" khong phai la so hoan thien";
	
	return 0;
}
