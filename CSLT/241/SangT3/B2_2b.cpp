//S = 1×2 + 2×3×4 +... + n×(n+1)×...×(2n).
//Tinh S khong dung de qui
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int s = 0;
	for (int i=1; i<=n; i++){
		int tich = 1;
		for(int j = i; j<=2*i; j++)
			tich = tich * j;
		s = s + tich;
	}
	cout<<"S("<<n<<")="<<s;
	return 0;
}
