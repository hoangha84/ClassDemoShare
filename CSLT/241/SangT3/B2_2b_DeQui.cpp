//S = 1×2 + 2×3×4 +... + n×(n+1)×...×(2n).
//Tinh S bang de qui
#include <iostream>
using namespace std;

int S(int n){
	if(n==1)
		return 2;
	int tich = 1;
	for (int i = n; i<=n*2; i++)
		tich = tich * i;
	return S(n-1) + tich;	
}

int main(){
	int n; cin>>n;
	
	cout<<"S("<<n<<")="<<S(n);
	return 0;	
}
