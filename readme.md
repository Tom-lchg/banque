## Devoir

À partir de la base de données déjà créée, développer des fonctionnalités en PHP permettant à un
client de gérer son compte bancaire en ligne. Les fonctionnalités à implémenter incluent :

1. **Inscription** : Le client pourra créer un compte en fournissant ses informations personnelles
   (nom, prénom, email, etc.).
2. **Connexion** : Après l'inscription, le client pourra se connecter en utilisant ses identifiants (email
   et mot de passe) pour accéder à son espace personnel sécurisé.
3. **Dépôts et retraits**: Le client pourra réaliser des dépôts et des retraits d'argent directement
   depuis son compte. Le montant sera mis à jour en temps réel dans la base de données.
4. **Virements**: Le client aura la possibilité d'effectuer des virements vers d'autres comptes.
   Lorsqu'il choisit de faire un virement, une liste déroulante (select option) affichera les comptes
   bancaires disponibles pour recevoir le transfert.
5. **Consultation du solde** : Le client pourra consulter à tout moment le solde de son compte
   bancaire.

## Contraintes et validations importantes

- Accès sécurisé : Le client, une fois connecté, aura accès à toutes les fonctionnalités
  mentionnées ci-dessus via son tableau de bord.
- Aucun découvert autorisé : Le système doit interdire les retraits ou virements si le solde du
  compte est insuffisant, garantissant que le solde ne puisse jamais être négatif.

NB : Vous pouvez interagir directement avec la base de données sans avoir besoin de créer des classes
(comme Client et CompteBancaire). Il n'est pas nécessaire d'utiliser un modèle MVC. Toutefois, il est
recommandé de séparer le PHP du HTML dans vos fichiers. Vous pouvez placer la logique PHP en haut
de la page et le code HTML en bas.
