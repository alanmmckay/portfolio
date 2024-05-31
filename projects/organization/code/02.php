<?php
    $root_directory = "../../../";
    require($root_directory."code_header.php");
?>
def sum_g(aList):
    return sum(alist)

def sum_h_helper(aList,index):
    length = len(aList)
    if index &gt;= length:
        return 0
    else:
        value = aList[index]
        return value + sum_h_helper(aList,index + 1)

def sum_h(aList):
    return sum_h_helper(aList,0)

def sum_i_helper(aList,index):
    length = len(aList)
    value = aList[index]
    if index &gt;= (length - 1):
        return value
    else:
        return value + sum_i_helper(aList,index + 1)

def sum_i(aList):
    if len(aList) &gt; 0:
        return sum_i_helper(aList,0)
    else:
        return 0

def sum_j_helper(aList,value):
    length = len(aList)
    if length &lt;= 0:
        return value
    else:
        new_value = aList.pop()
        return value + sum_j_helper(aList,new_value)

def sum_j(aList):
    listCopy = list(aList)
    if len(listCopy) &gt; 0:
        value = listCopy.pop()
        return sum_j_helper(listCopy,value)
    else:
        return 0

def sum_k(aList):
    if len(aList) &lt;= 0:
        return 0
    else:
        value = aList[0]
        if len(aList) &lt;= 1:
            return value
        else:
            other_values = aList[1:]
            return value + sum_k(other_values)

def sum_l(aList):
    if len(aList) &lt;= 0:
        return 0
    elif len(aList) &lt;= 1:
        return aList[0]
    else:
        return aList[0] + sum_l(aList[1:])
<?php
    require($root_directory."code_footer.html");
?>
