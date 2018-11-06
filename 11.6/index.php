<?php 
public int NumberOf1Between1AndN_Solution(int n) {
    int count = 0;
    for(int i=0; i<=n; i++){
        int temp = i;
        //如果temp的任意位为1则count++
        while(temp!=0){
            if(temp%10 == 1){
                count++;
            }
            temp /= 10;
        }
    }
    return count;
}
?>