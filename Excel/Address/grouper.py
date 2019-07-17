import csv

path = r"C:\xampp\htdocs\myapplication\Excel\Address\barangays.csv"
with open(path) as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')

    parents = []
    
    isParentExist = False
    for row in csv_reader:
        if(len(row) > 1):
            rowParentName = row[0]
            rowChildName = row[1]

            for parent in parents:
                if(rowParentName == parent['name']):
                    parent['children'].append(rowChildName)
                    isParentExist = True
                    break
                else:
                    isParentExist = False
            if(not isParentExist):
                parents.append({
                    'name': rowParentName,
                    'children': [rowChildName]
                })
                isParentExist = True
    
    outputFile = open(r"C:\xampp\htdocs\myapplication\Excel\Address\barangays_restructured.csv", "w+")
    
    parentsLength = len(parents)
    i = 0
    while(i < parentsLength):
        outputFile.write("\"" + parents[i]["name"] + "\"")
        if(i < (parentsLength - 1)):
            outputFile.write(",")
        else:
            outputFile.write("\n")
        i += 1

    parentsLength = len(parents)
    maxLen = 0
    for parent in parents:
        if(len(parent["children"]) > maxLen):
            maxLen = len(parent["children"])


    j = 0
    while(j < maxLen):
        i = 0
        while(i < parentsLength):
            if(j < len(parents[i]["children"])):
                outputFile.write("\"" + parents[i]["children"][j] + "\"")
            else:
                outputFile.write("\"\"")
            if(i < (parentsLength - 1)):
                outputFile.write(",")
            else:
                outputFile.write("\n")
            i += 1
        j += 1