//3.7.a Tinh tong S = 1 + 2 + 3 +....+ n
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int s = 0;
	for(int i = 1; i<=n; i++)
		s+=i;
	
	cout<<"S("<<n<<")="<<s;
	
	return 0;
}
