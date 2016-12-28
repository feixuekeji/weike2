function addNewSelect(){
   var tabObj=document.getElementById("myTab");//获取添加数据的表格
   var rowsNum = tabObj.rows.length;  //获取当前行数
   var colsNum=tabObj.rows[rowsNum-1].cells.length;//获取行的列数
   var myNewRow = tabObj.insertRow(rowsNum);//插入新行
   var newTdObj1=myNewRow.insertCell(0);
   document.cookie="rowsNum="+rowsNum;
   newTdObj1.innerHTML="<input type='text'  name='nodeid[]' id='nodeid'"+rowsNum+"  value='"+rowsNum+"' readonly='true'>";
   var id= document.getElementById("nodeid"+rowsNum);document.cookie="id="+id;
   var newTdObj2=myNewRow.insertCell(1);
   newTdObj2.innerHTML="<input type='textarea'  name='question[]'"+rowsNum+" id='question'"+rowsNum+"  ><br><br>A<input type='textarea' name='hwa[]'"+rowsNum+" id='hwa'"+rowsNum+"  ><br><br>B<input type='textarea' name='hwb[]'"+rowsNum+" id='hwb'"+rowsNum+"  ><br><br>C<input type='textarea' name='hwc'"+rowsNum+" id='hwc[]'"+rowsNum+"  ><br><br>D<input type='textarea' name='hwd[]'"+rowsNum+" id='hwd'"+rowsNum+"  >";
   var newTdObj3=myNewRow.insertCell(2);
   newTdObj3.innerHTML="A<input type='radio' name='xuanxiang[]' id='nodename'"+rowsNum+">B<input type='radio' name='xuanxiang[]' id='nodename'"+rowsNum+">C<input type='radio' name='xuanxiang[]' id='nodename'"+rowsNum+">D<input type='radio' name='xuanxiang[]' id='nodename'"+rowsNum+">  ";
  }
//窗口表格删除一行
  function removeSelect(){
   var tabObj=document.getElementById("myTab");
   var rowsNum = tabObj.rows.length;  //获取当前行数
   var maxid=rowsNum-1;
   if(rowsNum>1){
    tabObj.deleteRow(maxid);
    }
  }
  /*******************************************************************************************************************************/
  function addNewRad(){
   var tabObj=document.getElementById("myTab1");//获取添加数据的表格
   var rowsNum = tabObj.rows.length;  //获取当前行数
   var colsNum=tabObj.rows[rowsNum-1].cells.length;//获取行的列数
   var myNewRow = tabObj.insertRow(rowsNum);//插入新行
   var newTdObj1=myNewRow.insertCell(0);
   newTdObj1.innerHTML="<input type='text' name='nodeid1[]' id='nodeid1'"+rowsNum+"  value='"+rowsNum+"' readonly='true' >";
   var newTdObj2=myNewRow.insertCell(1);
   newTdObj2.innerHTML="<input type='textarea' name='nodeque[]' id='nodeque'"+rowsNum+" >";
   var newTdObj3=myNewRow.insertCell(2);
   newTdObj3.innerHTML="<input type='textarea' name='nodeans[]' id='nodeans'"+rowsNum+">  ";
  }
//窗口表格删除一行
  function removeRad(){
   var tabObjr=document.getElementById("myTab1");
   var rowsNumr = tabObjr.rows.length;  //获取当前行数
   var maxidr=rowsNumr-1;
   if(rowsNumr>1){
    tabObjr.deleteRow(maxidr);
    }
  }