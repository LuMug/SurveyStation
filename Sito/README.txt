Inserire alla fine del file httpd_uwamp.conf
<VirtualHost *:923>
#UWAMP Generate Virtual Host
	DocumentRoot "{DOCUMENTPATH}/SurveyStation"
	ServerName "localhost"
	ErrorLog "C:\UwAmp\bin\apache\logs\ss_error.log"
</VirtualHost>

Facendo così si specifica che il sito si trova nella cartella predefinita nella sottocartella SurveyStation, per accedervi basterà andare nel browser utilizzato e scrivere http://localhost:923/surveystation/
