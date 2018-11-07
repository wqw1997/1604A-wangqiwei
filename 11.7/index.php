<?php
public class Solution {
    public int min(int a,int b,int c){
        int min=(a<b)?a:b;
        return (min<c)?min:c;
    }
    public int GetUglyNumber_Solution(int index) {
        //1,2,3,4,5....
        if(index<=0)
            return 0;
        int[] a=new int[index];
        a[0]=1;
        int multi1=0;
        int multi2=0;
        int multi3=0;
        for(int i=1;i<a.length;i++){
            int min=min(a[multi1]*2,a[multi2]*3,a[multi3]*5);
            a[i]=min;
            while(a[multi1]*2<=min)
                multi1++;
            while(a[multi2]*3<=min)
                multi2++;
            while(a[multi3]*5<=min)
                multi3++;
                
        }
        
        return a[a.length-1];
    }
}

?>