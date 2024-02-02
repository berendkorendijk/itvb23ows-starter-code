FROM jenkins/jenkins:latest
ENV JAVA_OPTS -Djenkins.install.runSetupWizard=false
COPY plugins.txt /usr/share/jenkins/ref/plugins.txt
RUN  jenkins-plugin-cli -f /usr/share/jenkins/ref/plugins.txt

# Install docker-compose and add jenkins user to docker group
USER root
RUN apt-get update && apt-get install -y docker-compose=1.29.2-3