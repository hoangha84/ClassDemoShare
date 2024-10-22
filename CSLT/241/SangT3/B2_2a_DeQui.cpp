//2.2.a S = 1 + 1×2 + 1×2×3 +... +1×2×3×...×n
//Tinh S bang de qui
#include <iostream>
using namespace std;

int S (int n){
	if(n==1)
		return 1;
	int tich = 1;
	for (int i = 1; i<=n; i++)
		tich = tich * i;
	return S(n-1) + tich;
}

int main(){
	int n; cin>>n;
	
	cout<<"S("<<n<<")="<<S(n);
	return 0;
}
