<?php
    $root_directory = "../../../";
    require($root_directory."code_header.php");
?>
def sum_a(aList):
    total = 0
    for value in aList:
        total += value
    return total

def sum_b(aList):
    total = 0
    length = len(aList)
    for index in range(0,length):
        value = aList[index]
        total += value
    return total

def sum_c(aList):
    total = 0
    index = 0
    length = len(aList)
    while index &lt; length:
        value = aList[index]
        total = total + value
        index = index + 1
    return total

def sum_d(aList):
    listCopy = list(aList)
    total = 0
    length = len(listCopy)
    while length &gt; 0:
        value = listCopy.pop()
        total = total + value
        length = len(listCopy)
    return total

def sum_e(aList):
    listCopy = list(aList)
    total = 0
    while len(listCopy) &gt; 0:
        value = listCopy.pop()
        total = total + value
    return total

def sum_f(aList):
    total = sum(aList) #python's built-in sum function
    return total
<?php
    require($root_directory."code_footer.html");
?>
