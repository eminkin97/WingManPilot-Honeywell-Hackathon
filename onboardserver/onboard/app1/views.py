from django.shortcuts import render
from django.http import HttpResponse
import requests


# Create your views here.
def index(request):
	if (request.method == "POST"):
		r = requests.post(ip, request)
		return HttpResponse("Success");
	elif (request.method == "GET"):
		return HttpResponse("Onboard Server");
	else:
		return HttpResponse("Fail");
