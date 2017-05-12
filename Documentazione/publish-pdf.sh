pandoc -s --template="template/templateDOC.latex" --latex-engine=xelatex -o $1.pdf $1.yaml $1.md
#pandoc -s --template="../template/templateSAM.latex" -o $1.pdf $1.yaml $1.md
