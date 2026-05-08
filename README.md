PLEASE BUIL A SAAS with laravel12 and pho 8.2 and bult a wholesale billing vos style prefix based
INTEGRATING FREESWITCH+CGRATE
1. Authentication & Multi-Tenant
Roles
Super Admin
Carrier
Reseller
Customer
Finance
NOC/Support
Features
JWT auth
API tokens
RBAC permissions
Multi-company isolation
2. Customer Management
Entities
Customers
Resellers
Carriers
Vendors
Features
Credit limits
Balance tracking
Rate plans
SIP credentials
IP authentication
Fraud thresholds
3. SIP Trunk Management
Inbound/Outbound Trunks
Features
SIP registration
IP auth
Codec settings
CPS limits
Concurrent call limits
Failover routing
Priority routing
4. Routing Engine (Very Important)
LCR (Least Cost Routing)
Features
Prefix matching
Cost comparison
Priority routing
Quality-based routing
ASR/ACD routing
Real-time failover
Route groups
Tables
routes
route_groups
prefixes
vendors
gateways
Routing Logic
Match destination prefix
Find active vendor routes
Compare:
buy rate
quality score
ASR
ACD
Select best route
Failover if failed
5. Rate Management
Features
Buy rates
Sell rates
Rate sheets upload
Margin rules
Effective dates
Peak/offpeak
Billing increments
File Uploads
CSV/XLSX import
Mass updates
6. Real-Time Billing

Use:

CGRateS
Redis cache
Billing Features
Per-minute billing
Per-second billing
Initial interval
Increment interval
Rounding rules
Live debit
Prepaid/postpaid
Balance Types
Main balance
Bonus balance
DID balance
7. DID Management
Features
DID inventory
DID assignment
Monthly recurring charges
DID routing
SIP forwarding
Geographic DID support
DID Types
Local DID
Toll-free DID
Mobile DID
Tables
dids
did_orders
did_routes
8. Top-Up / Recharge System
Features
Manual recharge
Voucher recharge
Online payment gateway
Auto recharge
Balance transfer
Payment Gateways
Stripe
bKash
Nagad
PayPal
Ledger

Double-entry accounting preferred.

9. CDR Processing
Features
Real-time CDR ingestion
CDR rating
Search/filter/export
Dispute management
Data Fields
CLI
Destination
Duration
Billsec
Buy cost
Sell cost
Profit
10. Fraud Detection
Required
Concurrent call detection
Geographic anomaly
Excessive CPS
Balance drain detection
Blacklist/whitelist
Actions
Block account
Send Telegram alert
Email/SMS alerts
11. Reporting & Analytics
Dashboards
Profit
ASR
ACD
Traffic volume
Carrier quality
Customer usage
Export
CSV
XLSX
PDF
12. Carrier Monitoring
Features
SIP OPTIONS ping
Gateway uptime
Packet loss
MOS score
RTP stats
Database Design (Important)
Recommended Tables
Core
users
tenants
accounts
balances
transactions
Routing
routes
route_groups
gateways
vendors
prefixes
Billing
ratecards
rates
cdrs
invoices
DID
dids
did_routes
did_orders
SIP
trunks
registrations
auth_ips
APIs
REST APIs
Required
Customer API
DID API
Billing API
Routing API
CDR API
Payment API
Webhooks
Payment success
Fraud alert
Low balance
