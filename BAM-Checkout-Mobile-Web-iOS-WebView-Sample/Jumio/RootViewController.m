//
//  RootViewController.m
//  Jumio
//

#import "RootViewController.h"
@interface RootViewController ()

@end

@implementation RootViewController

- (void)viewDidLoad{
    [super viewDidLoad];
    
    // Do any additional setup after loading the view from its nib.
    if([self connectedToInternet])
    {
        NSURL *nsUrl = [NSURL URLWithString:@"YOURBAMCHECKOUTMOBILEWEBURL"];
        NSURLRequest *request = [NSURLRequest requestWithURL:nsUrl cachePolicy:NSURLRequestReloadIgnoringLocalAndRemoteCacheData timeoutInterval:20];
        [self.webView loadRequest:request];
    }
    else{
        UIAlertView *alertView = [[UIAlertView alloc] initWithTitle:@"Error" message:@"No Internet or network connection." delegate:self cancelButtonTitle:@"OK" otherButtonTitles:nil];
        [alertView show];
    }
    self.webView.delegate = self;
}


- (void)webViewDidStartLoad:(UIWebView *)webView{
    self.activityView.hidden = NO;
    self.activityView.center = self.webView.center;
}


- (void)webViewDidFinishLoad:(UIWebView *)webView{
    self.activityView.hidden = YES;
}


- (void)webView:(UIWebView *)webView didFailLoadWithError:(NSError *)error{
    self.activityView.hidden = YES;
    UIAlertView *alertView = [[UIAlertView alloc] initWithTitle:@"Error" message:error.localizedDescription delegate:self cancelButtonTitle:@"OK" otherButtonTitles:nil];
    [alertView show];
}


- (void)didReceiveMemoryWarning{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (BOOL)connectedToInternet{
    NSURL *nsUrl = [NSURL URLWithString:@"https://www.jumio.com"];
    NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL:nsUrl];
    [request setHTTPMethod:@"HEAD"];
    NSHTTPURLResponse *response;
    [NSURLConnection sendSynchronousRequest:request returningResponse:&response error: NULL];
    
    return ([response statusCode] == 200) ? YES : NO;
}


-(void)viewWillAppear:(BOOL)animated{
    [super viewWillAppear:animated];
}


- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation{
    // Return YES for supported orientations
	return UIInterfaceOrientationLandscapeRight == interfaceOrientation || UIInterfaceOrientationLandscapeLeft == interfaceOrientation ||
    UIInterfaceOrientationPortrait == interfaceOrientation;
}

@end
