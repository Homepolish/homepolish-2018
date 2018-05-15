release:
	git tag $(shell echo "" | awk -v date=$(shell date +"%Y%m%d.") -v sha=$(shell git rev-parse --short master) '{print date sha}')
